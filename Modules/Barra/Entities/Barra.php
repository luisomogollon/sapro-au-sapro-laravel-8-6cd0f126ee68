<?php

namespace Modules\Barra\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Barra\Entities\BarraEstado;
use Modules\Ordenes\Entities\Orden;
use Modules\Barra\Entities\Metales;
use Kleemans\AttributeEvents;
use Modules\Barra\Entities\BarraRegistro;
use Modules\Bancos\Entities\Movimiento;
use App\Models\User;
use Modules\Bloque\Entities\Bloque;
use Modules\Ley\Entities\Ley;
use Modules\Viruta\Entities\Viruta;
use Modules\Login\Entities\logTrait;
use Modules\Barra\Events\BarraComisionEvent;
use Modules\Bancos\Entities\Banco;

class Barra extends Model
{
    use HasFactory, AttributeEvents, logTrait;
    protected $with =[
        "metales"
        ,'usuario'
        ,'ley'
        ,'viruta'
        ,'bloque'
    ];
    protected $fillable = [
        "barra_peso_ingreso"
        ,"barra_codigo"
        ,"barra_ultimo_peso"
        ,"barra_ley_ingreso"
        ,"barra_ley_final"
        ,"barra_und_masa"
        ,"barra_muestra"
        ,"barra_peso_granalla"
        ,"barra_peso_banco"
        ,"barra_descripcion_operacion"
        ,"barra_estado_id"
        ,"orden_id"
        ,"user_id"
        ,"barra_ley_recuperable"
        ,"barra_muestra_procesada"
        ,"barra_oro_cliente"
        ,"barra_oro_comision"
        ,"barra_comision"
        ,"barra_peso_lab"
        ,"barra_peso_lab_salida"
        ,"barra_peso_refineria"
        ,"barra_oro_comision_real"
    ];
    protected $table = "barras";

    protected $appends = [
        'barra_status'
        ,'barra_plata'
        ,'barra_otros'
    ];

    protected $dispatchesEvents = [
        'barra_oro_comision_real:*'          => BarraComisionEvent::class,
    ];

    public static function boot() {

        parent::boot();
        static::creating(function ($barra){
            $ley = Ley::latest()->first() ?? null;
            if ($barra->ley_id==null) {
                $barra->ley_id = $ley->id?? null;
            }
            $viruta = Viruta::latest()->first() ?? null;
            if ($barra->viruta_id==null) {
                $barra->viruta_id = $viruta->id?? null;
            }
        });

        static::created(function ($barra){
          $barra_r = new BarraRegistro ();
          $barra_r->barra_id = $barra->id;
          $barra_r->barra_registro_log = $barra;
          $barra_r->save();
          $barra->barra_comision=$barra->orden->comision_monto;
          $barra->save();
        });

        static::updating(function ($barra){
          if($barra->barra_ley_final != null and $barra->barra_ley_recuperable === null){
                $ley = $barra->ley->ley_margen  ?? 5;
                $barra->barra_ley_recuperable = $barra->barra_ley_final - $ley;
                $barra->barra_peso_banco = ($barra->barra_peso_ingreso * ($barra->barra_ley_recuperable/1000))
                *((100 - $barra->barra_comision)/100);
          }
          $model = $barra->actualizando($barra);
          $barra_r = new BarraRegistro ();
          $barra_r->barra_id = $barra->id;
          $barra_r->barra_registro_log = $model;
          $barra_r->save();
        });
    }

    public function getBarraStatusAttribute()
    {
        return $this->BarraEstado->barra_estado_nombre?? 'Sin Estado';
    }

    public function scopePesoBancoOroReal ($query){
        return $query->where('barra_peso_banco','=',0)
                ->where('barra_oro_comision_real','=',null);
    }

    public function getBarraPlataAttribute()
    {
        $platas = $this->
        metales()
        ->where('metal_id',2)
        ->where('barra_id',$this->id
        )->get();
        $plata = 0.0000;
        foreach ($platas as $key => $value) {
            $plata = ($value->pivot->barra_metal_contenido/100)*$this->barra_peso_granalla;
        }

        return $plata;
    }

    public function getBarraOtrosAttribute()
    {
        $metales =$this->
        metales()
        ->whereNotIn('metal_id',[1,2])
        ->where('barra_id',$this->id
        )->get();
        $otros = 0.0000;
        foreach ($metales as $key => $value) {
            $a = ($value->pivot->barra_metal_contenido/100)* $this->barra_peso_granalla??0;
            $otros = $otros + $a;
        }
        return $otros;
    }

    public function oroComisionReal (){

        $banco_oro = Banco::where('banco_mineral', 'ORO')->get();
        $id = auth('sanctum')->user()->id;
        foreach ($banco_oro as $key => $banco) {
            if ($banco->banco_comision > 0 and $banco->banco_comision != null) {
                    if ($this->barra_oro_comision_real > 0) {
                        $movimiento = new Movimiento();
                        $movimiento->movimiento_cifra = ($banco->banco_comision / 100) * $this->barra_oro_comision_real;
                        $movimiento->banco_id = $banco->id;
                        $movimiento->user_id = $id;
                        $movimiento->barra_id = $this->id;
                        $movimiento->save();
                    }
            }
        }
    }

    protected static function newFactory()
    {
        return \Modules\Barra\Database\factories\BarraFactory::new();
    }

    public function barraEstado (){
        return $this->belongsTo(barraEstado::class,
                                "barra_estado_id"
                                ,"id");
    }

    public function orden (){
        return $this->belongsTo(Orden::class
                                ,"orden_id"
                                ,"id");
    }

    public function metales(){
        return $this->belongsToMany(Metales::class
                                    ,"barra_metal"
                                    ,"barra_id"
                                    ,"metal_id")
                                    ->withTimestamps()
                                    ->withPivot("barra_metal_contenido");
    }

    public function barraRegistros (){
        return $this->hasMany(BarraRegistro::class
                             ,"barra_id"
                             ,"id");
    }

    public function movimientos()
    {
        return $this->hasMany(
            Movimiento::class,
            "barra_id",
            "id"
        );
    }

    public function usuario (){
        return $this->belongsTo(User::class
                                ,'user_id'
                                ,'id')->select('id'
                                ,'first_name',
                                'last_name',
                                'email',
                                'department_id',
                                'jobtitle',
                                'employee_num',
                                'phone');
    }

    public function ley (){
        return $this->belongsTo(Ley::class
                                ,"ley_id"
                                ,"id");
    }

    public function viruta (){
        return $this->belongsTo(Viruta::class
                                ,"viruta_id"
                                ,"id");
    }

    public function bloque (){
        return  $this->belongsToMany(Bloque::class
        ,"barra_bloque"
        ,"barra_id"
        ,"bloque_id")
        ->withTimestamps()
        ->withPivot('barra_bloque_cantidad', 'user_id');
    }
}

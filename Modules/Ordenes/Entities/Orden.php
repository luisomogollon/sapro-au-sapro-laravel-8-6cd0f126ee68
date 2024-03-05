<?php

namespace Modules\Ordenes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clientes\Entities\Cliente;
use Modules\Factura\Entities\Factura;
use Modules\Barra\Entities\Barra;
use Modules\Ordenes\Entities\OrdenEstado;
use Kleemans\AttributeEvents;
use Modules\Ordenes\Events\OrdenCrearFactura;
use Modules\Ordenes\Entities\OrdenRegistro;
use Modules\Ordenes\Entities\Comision;
use App\Models\User;
use Modules\Inconformidad\Entities\Inconformidad;
use Modules\Lingotes\Entities\Lingote;
use Modules\Login\Entities\logTrait;
use Modules\Lingotes\Entities\Presentaciones;

class Orden extends Model
{
    use HasFactory, AttributeEvents, logTrait;
    //protected $morphClass = 'orden';
    protected $with =[
        'usuario'
        ,'cliente'
        ,'receptor'
        ,'comision'
        ,'presentacion'
    ];
    protected $table = "ordenes";
    protected $fillable = [
        "orden_referencia"
        ,"orden_descripcion"
        ,"cliente_id"
        ,"orden_estado_id"
        ,"orden_tipo"
        ,"comision_id"
        ,"user_id"
        ,"orden_cedula"
        ,"receptor_id"
        ,"orden_impresa"
        ,"orden_troquelar"
        ,"presentacion_id"
    ];
    protected $dispatchesEvents = [
        //'updated'   => OrdenCrearFactura::class,
        'orden_estado_id:6'         => OrdenCrearFactura::class,
    ];
    protected $appends = [
        'orden_status'
        ,'comision_monto'
    ];

    public static function boot() {

        parent::boot();
        static::creating(function ($orden){
            $comision = Comision::find(1) ?? null;

            if ($orden->receptor_id==null) {
                $orden->receptor_id = $orden->cliente_id;
            }
            $cliente = Cliente::find($orden->receptor_id);
            $presentacion = $cliente->presentacion_id ??null;
            $comision2= $cliente->comision_id ?? null;
            $orden->comision_id = $comision2;
            $orden->presentacion_id = $presentacion;
            if ($orden->comision_id==null) {
                $orden->comision_id = $comision->id?? null;
            }
        });
        static::created(function ($orden){
          $orden_r = new OrdenRegistro ();
          $orden_r->orden_id = $orden->id;
          $orden_r->orden_registro_log = $orden;
          $orden_r->save();
          $orden->load('receptor');
        });
        static::updating(function ($orden){
          $model = $orden->actualizando($orden);
          $orden_r = new OrdenRegistro ();
          $orden_r->orden_id = $orden->id;
          $orden_r->orden_registro_log = $model;
          $orden_r->save();
        });
    }

    public function getOrdenStatusAttribute()
    {
        return $this->ordenEstado->orden_estado_nombre?? 'Sin Estado';
    }

    public function getComisionMontoAttribute()
    {
        return $this->comision->comision_monto?? 4.5;
    }

    protected static function newFactory()
    {
        return \Modules\Ordenes\Database\factories\OrdenFactory::new();
    }

    public function scopeSetBarrasComisionReal($query){
        return $query->whereHas('barras', fn ($q) =>
        $q->pesoBancoOroReal())->where('orden_estado_id',13);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,
                                "cliente_id","id");
    }

    public function receptor(){
        return $this->belongsTo(Cliente::class,
                                "receptor_id","id");
    }

    public function factura(){
        return $this->hasOne(Factura::class,
                             'orden_id',
                             'id'
                            );
    }

    public function barras(){
        return $this->hasMany(Barra::class
                            ,"orden_id"
                            ,"id");
    }


    public function barrasFundicion(){

        $fundicion= count($this->barras()->where('barra_estado_id',10)->get());
        $barras = count ($this->barras);
        return $fundicion==$barras;
    }


    public function barrasFiltroCeros(){
        return $this->hasMany(Barra::class
                            ,"orden_id"
                            ,"id")->where('barra_peso_banco','>',0);
    }

    public function barrasFiltroBanco(){
        return $this->hasMany(Barra::class
                            ,"orden_id"
                            ,"id")->where('barra_peso_banco','=',0)->where('barra_oro_comision_real',null);
    }

    public function ordenEstado(){
        return $this->belongsTo(OrdenEstado::class
                                ,"orden_estado_id"
                                ,"id");
    }

    public function oredenRegistros(){
        return $this->hasMany(OrdenRegistro::class
                             ,"orden_id"
                             ,"id");
    }

    public function comision (){
        return $this->belongsTo(Comision::class
                                ,"comision_id"
                                ,"id");
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

    public function inconformidad (){
        return $this->hasMany(Inconformidad::class,
                                'model_id',
                                 'id',
                                  )
                                  ->where('model_type', 'App\Models\Ordene')
                                  ->where('activated',0);
   }

   public function lingotes (){
       return $this->hasMany(Lingote::class
                            ,'orden_id'
                            ,'id');
   }

   public function presentacion (){
       return $this->belongsTo(Presentaciones::class,"presentacion_id","id");
   }

}

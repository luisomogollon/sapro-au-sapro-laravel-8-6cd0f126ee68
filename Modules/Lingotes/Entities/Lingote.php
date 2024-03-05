<?php

namespace Modules\Lingotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lingotes\Entities\LingoteEstado;
use Modules\Lingotes\Entities\Presentaciones;
use Modules\Salidas\Entities\Salida;
use Modules\Lingotes\Entities\BarraLingote;
use Modules\Barra\Entities\Barra;
use Modules\Lingotes\Entities\LingoteRegistro;
use App\Models\User;
use Modules\Ordenes\Entities\Orden;
use Modules\Login\Entities\logTrait;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Lingote extends Model
{
    use HasFactory, logTrait;
    
    protected $with =[
        'usuario'
    ];
    protected $table = 'lingotes';
    protected $fillable = [
        'lingote_peso'
        ,'lingote_troquelado_codigo'
        ,'salida_id'
        ,'presentacion_id'
        ,'lingote_estado_id'
        ,'lingote_descripcion'
        ,'updated_by_admin_user_id'
        ,'user_id'
        ,'orden_id'
        ,'lingote_peso_real'
        ,'lingote_ley'
    ];

    protected $appends = [
        'lingote_codigo'
    ];

    public function getLingoteCodigoAttribute()
    {
        return $this->lingote_troquelado_codigo??'ID:'.$this->id.'-'.$this->lingote_peso;
    }

    public static function boot() {
  
        parent::boot();
        static::creating(function ($lingote){
            $orden = Orden::findOrFail($lingote->orden_id);
            if (!$orden->orden_troquelar) {
                $id = IdGenerator::generate(['table' => 'lingotes',
                                            'field'=>'lingote_troquelado_codigo', 
                                            'length' => 12
                                            ,'prefix' =>'LISO-'
                                            ,'reset_on_prefix_change'=>1]);
                  $lingote->lingote_troquelado_codigo = $id;
              }
            
        });
        static::created(function ($lingote){  
          $lingote_r = new LingoteRegistro ();
          $lingote_r->lingote_id = $lingote->id;
          $lingote_r->lingote_registro_log = $lingote;
          $lingote_r->save();
         
        });
        static::updating(function ($lingote){
          $model = $lingote->actualizando($lingote);
          $lingote_r = new lingoteRegistro ();
          $lingote_r->lingote_id = $lingote->id;
          $lingote_r->lingote_registro_log = $model;
          $lingote_r->save();
        });
    }
    
    protected static function newFactory()
    {
        return \Modules\Lingotes\Database\factories\LingoteFactory::new();
    }
    public function presentacion (){
        return $this->belongsTo(Presentaciones::class
                                ,'presentacion_id'
                                ,'id');
    }

    public function salida(){
        return $this->belongsTo(Salida::class
                                ,'salida_id'
                                ,'id');
    }

    public function lingoteEstado(){
        return $this->belongsTo(LingoteEstado::class
                                ,'lingote_estado_id'
                                ,'id');
    }

    public function barraLingote(){
        return $this->belongsToMany(Barra::class
        ,"barra_lingote"
        ,"lingote_id"
        ,"barra_id")
        ->withTimestamps()
        ->withPivot('barra_lingote_cantidad', 'user_id');
    }

    public function LingoteBarra(){
        return $this->belongsToMany(Barra::class
        ,"barra_lingote"
        ,"lingote_id"
        ,"barra_id")
        ->using(BarraLingote::class)
        ->withPivot('barra_lingote_cantidad', 'user_id');
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

    public function orden (){
        return $this->belongsTo(Orden::class
                                ,'orden_id'
                                ,'id');
    }

}

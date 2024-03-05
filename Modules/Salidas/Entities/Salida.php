<?php

namespace Modules\Salidas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Salidas\Entities\Colectores;
use App\Models\Colectore;
use Modules\Salidas\Entities\Estado_Salida;
use Modules\Salidas\Entities\SalidaRegistro;
use App\Models\User;
use Modules\Lingotes\Entities\Lingote;
class Salida extends Model
{
    use HasFactory;
    protected $with =[
        'usuario'
    ];
    protected $table = "salidas";
    protected $fillable = [
        "activated"
        ,"salida_descripcion"
        ,"colector_id"
        ,"salida_estado_id"
        ,"created_by_admin_user_id"
        ,"updated_by_admin_user_id"
        ,"user_id"
        ,"entregado_id"
    ];

    public static function boot() {
  
        parent::boot();
        static::creating(function (){
            
        });
        static::created(function ($salida){
          $salida_r = new salidaRegistro ();
          $salida_r->salida_id = $salida->id;
          $salida_r->salida_regitro_log = $salida;
          $salida_r->save();
        });
        static::updating(function ($salida){
          $salida_r = new salidaRegistro ();
          $salida_r->salida_id = $salida->id;
          $salida_r->salida_regitro_log= $salida;
          $salida_r->save();
        });
    }
    
    protected static function newFactory()
    {
        return \Modules\Salidas\Database\factories\SalidaFactory::new();
    }

    public function colector (){
        return $this->belongsTo(Colectore::class
                                ,'colector_id'
                                ,'id');
    }

    public function colector_media () {
        return $this->belongsTo(Colectore::class
                                ,'colector_id'
                                ,'id');
    }

    public function salidaEstado (){
        return $this->belongsTo(Estado_Salida::class
                                ,'salida_estado_id'
                                ,'id');
    }

    public function salidaRegistros () {
        return $this->hasMany(SalidaRegistro::class
                              ,'salida_id'
                              ,'id');
    }

    public function salidas(){
        return $this->hasMany(salida::class
                              ,'salida_id'
                              ,'id');
    }

    public function usuario (){
        return $this->belongsTo(User::class
                                ,'user_id'
                                ,'id')->select('id'
                                ,'first_name',
                                'last_name',
                                'email',
                                'password',
                                'department_id',
                                'jobtitle',
                                'employee_num',
                                'phone');
    }

    public function entregado (){
        return $this->belongsTo(User::class
                                ,'entregado_id'
                                ,'id')->select('id'
                                ,'first_name',
                                'last_name',
                                'email',
                                'password',
                                'department_id',
                                'jobtitle',
                                'employee_num',
                                'phone');
    }

    public function lingotes(){
        return $this->hasMany(Lingote::class
                              ,'salida_id'
                              ,'id');
    }
}

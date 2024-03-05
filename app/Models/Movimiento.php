<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Bancos\Entities\Banco;
use Modules\Barra\Entities\Barra;
use App\Models\User;
use Kleemans\AttributeEvents;
use Modules\Bancos\Events\MovimientoTrue;
use Illuminate\Support\Facades\Log;
class Movimiento extends Model
{
    use AttributeEvents;

    protected $fillable = [
        'activated',
        'banco_id',
        'barra_id',
        'movimiento_cifra',
        'movimiento_codigo',
        'movimiento_tipo',
        'user_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $dispatchesEvents = [
            'activated:true' => MovimientoTrue::class
    ];
    protected $appends = ['resource_url'];


    public static function boot() {

        parent::boot();
        static::creating(function ($movimiento){

        });

        static::created(function ($movimiento){
         /* $banco = Banco::find($movimiento->banco_id);
          if(strcmp($movimiento->movimiento_tipo,'DEPOSITO')){

            $movimiento->depositoBanco($banco, $movimiento->movimiento_cifra);
          }else{

            $movimiento->retiroBanco($banco, $movimiento->movimiento_cifra);
          }*/
        });

        static::updating(function ($movimiento){

        });
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/movimientos/'.$this->getKey());
    }


    public function depositoBanco($banco, $cifra){
        $banco->banco_cantidad_disponible = $banco->banco_cantidad_disponible + $cifra;
        $banco->banco_cantidad_depositos = $banco->banco_cantidad_depositos + $cifra;
        $banco->save();
    }

    public function retiroBanco($banco , $cifra){
        $banco->banco_cantidad_disponible = $banco->banco_cantidad_disponible - $cifra;
        $banco->banco_cantidad_retiros = $banco->banco_cantidad_retiros + $cifra;
        $banco->save();
    }

    public function aprobar($movimiento){
        $banco = Banco::find($movimiento->banco_id);
        LOG::info($movimiento->movimiento_tipo);
        if($movimiento->movimiento_tipo==='DEPOSITO'){

          $movimiento->depositoBanco($banco, $movimiento->movimiento_cifra);
        }else{

          $movimiento->retiroBanco($banco, $movimiento->movimiento_cifra);
        }
    }

    public function banco (){
        return $this->belongsTo(Banco::class
                             ,"banco_id"
                             ,"id");
    }

    public function barra (){
        return $this->belongsTo(Barra::class
                             ,"barra_id"
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

}

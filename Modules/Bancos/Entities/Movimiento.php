<?php

namespace Modules\Bancos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Bancos\Entities\Banco;
use Modules\Barra\Entities\Barra;
use App\Models\User;
class Movimiento extends Model
{
    use HasFactory;
    protected $with =[
        'usuario'
    ];
    protected $table = 'movimientos';
    protected $fillable = [
        'movimiento_tipo'
        ,'movimiento_codigo'
        ,'movimiento_cifra'
        ,'banco_id'
        ,'user_id'
        ,'barra_id'
        ,'activated'
    ];
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
    protected static function newFactory()
    {
        return \Modules\Bancos\Database\factories\MovimientoFactory::new();
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

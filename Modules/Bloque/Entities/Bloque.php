<?php

namespace Modules\Bloque\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Barra\Entities\Barra;
use Modules\Bloque\Entities\BloqueEstado;
use App\Models\User;
use Modules\Bloque\Events\BloqueGranallado;
use Modules\Bloque\Events\BloqueProcesado;
use Kleemans\AttributeEvents;
use Modules\Ordenes\Entities\Orden;
use Modules\Bancos\Entities\Movimiento;
use Modules\Bancos\Entities\Banco;
class Bloque extends Model
{
    use HasFactory, AttributeEvents;
    protected $table = 'bloques';
    protected $fillable = [
        'bloque_peso'
        ,'bloque_oro_cargado'
        ,'bloque_oro_resultado'
        ,'bloque_oro_granalla'
        ,'bloque_oro_ley'
        ,'bloque_oro_ley_real'
        ,'bloque_plata_cargado'
        ,'bloque_plata_resultado'
        ,'bloque_otros_cargado'
        ,'bloque_otros_resultado'
        ,'bloque_estado_id'
        ,'user_id'
    ];

    protected $dispatchesEvents = [
        'bloque_estado_id:3'         => BloqueGranallado::class ,
        'bloque_estado_id:4'         => BloqueProcesado::class,
    ];

    public function bloqueEstado(){
        return $this->belongsTo(BloqueEstado::class
                                ,'bloque_estado_id'
                                ,'id');
    }

    public function barras (){
        return  $this->belongsToMany(Barra::class
        ,"barra_bloque"
        ,"bloque_id"
        ,"barra_id")
        ->withTimestamps()
        ->withPivot('barra_bloque_cantidad', 'user_id');
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

    public function calcularMetales (){

        $plata = 0.0000;
        $oro = 0.00000;
        $otros = 0.0000;
        $barras = $this->barras;
        foreach ($barras as $key => $barra) {
            $oro = $oro + ($barra->barra_peso_granalla * ($barra->barra_ley_recuperable/1000));
            $plata = $plata + $barra->barra_plata;
            $otros = $otros + $barra->barra_otros;
            $barra->barra_estado_id=9;
        }

        $this->bloque_oro_cargado = $oro;
        $this->bloque_plata_cargado = $plata;
        $this->bloque_otros_cargado = $otros;
        $this->bloque_oro_ley = ($oro/$this->bloque_peso)*1000;
        $this->push();
    }

    public function calcularValoresBarra(){
         $oro_granalla = $this->bloque_oro_granalla;
         $oro_cargado = $this->bloque_oro_resultado;
         $ordenes = [];
        foreach ($this->barras()->where('barra_estado_id',9)->get() as $key => $barra) {
            $barra->barra_oro_cliente = (($barra->barra_peso_granalla * ($barra->barra_ley_recuperable/1000)) /$this->bloque_oro_cargado) * $this->bloque_oro_granalla;
            $barra->barra_oro_comision = $barra->barra_oro_cliente - $barra->barra_peso_banco ;
                if ($this->bloque_plata_cargado > 0){
                    $barra->barra_plata_comision =  ($barra->barra_plata/$this->bloque_plata_cargado)
                    * $this->bloque_plata_resultado;
                }
                if ($this->bloque_otros_cargado > 0) {
                    $barra->barra_otros_comision =  ($barra->barra_otros/$this->bloque_otros_cargado)
                    * $this->bloque_otros_resultado;
                }
            $barra->barra_estado_id = 10;
            $ordenes[] = $barra->orden_id;     
            $barra->save();
        }
        

    }


    public function enviarOrdenFundicion (){
        $ordenes = $this->barras->pluck('orden_id');
        $orders = Orden::with('barras')->whereIn('id',$ordenes)->get();
        foreach ($orders as $key => $orden) {
            if ($orden->barrasFundicion()) {
                $orden->orden_estado_id = 13;
                $orden->save();
            }
        }
    }

    public function otrosMetalesBanco (){
        $banco_plata= Banco::where('banco_mineral','PLATA')->get();
        $banco_otros = Banco::where('banco_mineral','OTROS METALES')->get();
        $id = auth('sanctum')->user()->id;
        foreach ($banco_plata as $key => $banco) {
            if ($banco->banco_comision and $banco->banco_comision!=null) {
                foreach ($this->barras as $key => $barra) {
                    if ($barra->barra_plata_comision >0) {
                        $movimiento = new Movimiento ();
                        $movimiento->movimiento_cifra = ($banco->banco_comision/100) * $barra->barra_plata_comision; 
                        $movimiento->banco_id = $banco->id;
                        $movimiento->user_id = $id;
                        $movimiento->barra_id = $barra->id;
                        $movimiento->save();
                    }
                   
                    
                }
            }
           
        }

        foreach ($banco_otros as $key => $banco) {
            if ($banco->banco_comision>0 and $banco->banco_comision!=null)
             {
                foreach ($this->barras as $key => $barra) {
                    if ($barra->barra_otros_comision >0) {
                        $movimiento = new Movimiento ();
                        $movimiento->movimiento_cifra = ($banco->banco_comision/100) * $barra->barra_otros_comision; 
                        $movimiento->banco_id = $banco->id;
                        $movimiento->user_id = $id;
                        $movimiento->barra_id = $barra->id;
                        $movimiento->save();
                    
                    }
                }
            }
        }
        
    }
    
    protected static function newFactory()
    {
        return \Modules\Bloque\Database\factories\BloqueFactory::new();
    }
}

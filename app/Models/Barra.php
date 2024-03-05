<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Inconformidad\Entities\Inconformidad;
use App\Models\Metale;
class Barra extends Model
{
    protected $fillable = [
        'barra_codigo',
        'barra_descripcion_operacion',
        'barra_estado_id',
        'barra_ley_final',
        'barra_ley_ingreso',
        'barra_muestra',
        'barra_peso_banco',
        'barra_peso_granalla',
        'barra_peso_ingreso',
        'barra_ultimo_peso',
        'barra_und_masa',
        'orden_id',
        'user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    protected $with = [
        "metales"
    ];
    protected $appends = ['resource_url'
                          ,'contenido'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/barras/'.$this->getKey());
    }

    public function getContenidoAttribute(){
        $contenido = [];
        if (count ($this->metales )>=1){
            foreach ($this->metales as $key => $metal) {
                $contenido [] = (object) ["metal" => $metal->metal_nombre
                                        ,"simbolo" => $metal->metal_simbolo
                                        ,"cantidad" => (($metal->barra_metal->barra_metal_contenido/100)*
                                                        $this->barra_peso_ingreso)
                                                    ];
            }
        }
        return  $contenido;
    }

    public function inconformidad (){
        return $this->morphMany(Inconformidad::class, 'inconforme', 'model_type', 'model_id');
   }

   public function metales(){
    return $this->belongsToMany(Metale::class
                                ,"barra_metal"
                                ,"barra_id"
                                ,"metal_id")
                                ->as("barra_metal")
                                ->where("activated",true)
                                ->withTimestamps()
                                ->withPivot("barra_metal_contenido");
    }

    public function scopeMetalesCargados($query){}
}

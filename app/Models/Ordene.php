<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Inconformidad\Entities\Inconformidad;
use App\Models\Salida;
use App\Models\Barra;
use App\Models\Metale;
class Ordene extends Model
{
    protected $fillable = [
        'orden_referencia',
        'orden_descripcion',
        'cliente_id',
        'orden_estado_id',
        'orden_tipo',
        'comision_id',
        'user_id'
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    protected $with = [
                'barrasAnalizadas'
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ordenes/'.$this->getKey());
    }

    public function barrasAnalizadas(){
        return $this->hasMany(Barra::class
                            ,"orden_id"
                            ,"id")->where("barra_estado_id",">=",3)->whereHas("metales");
    }

    public function inconformidad (){
         return $this->morphMany(Inconformidad::class, 'inconforme', 'model_type', 'model_id');
    }

    public function salidas(){
        return $this->hasMany(Salida::class,'colector_id','id');
    }


    public function scopeBarras ($query){
        return $query->whereHas('barrasAnalizadas', fn ($q) =>
        $q->whereHas('metales'));
    }
}

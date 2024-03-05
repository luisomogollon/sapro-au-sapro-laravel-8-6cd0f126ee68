<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    protected $fillable = [
        'bloque_estado_id',
        'bloque_oro_cargado',
        'bloque_oro_granalla',
        'bloque_oro_ley',
        'bloque_oro_ley_real',
        'bloque_oro_resultado',
        'bloque_otros_cargado',
        'bloque_otros_resultado',
        'bloque_peso',
        'bloque_plata_cargado',
        'bloque_plata_resultado',
        'user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/bloques/'.$this->getKey());
    }
}

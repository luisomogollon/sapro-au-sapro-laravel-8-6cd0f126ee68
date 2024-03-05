<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalidaEstado extends Model
{
    protected $table = 'salida_estado';

    protected $fillable = [
        'salida_estado_nombre',
        'salida_estado_descripcion',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/salida-estados/'.$this->getKey());
    }
}

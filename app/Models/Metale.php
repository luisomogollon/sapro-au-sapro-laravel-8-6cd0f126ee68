<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metale extends Model
{
    protected $fillable = [
        'activated',
        'metal_codigo',
        'metal_descripcion',
        'metal_nombre',
        'metal_simbolo',
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
        return url('/admin/metales/'.$this->getKey());
    }
}

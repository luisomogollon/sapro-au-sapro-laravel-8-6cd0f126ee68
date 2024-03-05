<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $fillable = [
        'banco_mineral',
        'banco_cuenta',
        'banco_cantidad_disponible',
        'banco_cantidad_retiros',
        'banco_cantidad_depositos',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/bancos/'.$this->getKey());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LingoteEstado extends Model
{
    protected $table = 'lingote_estado';

    protected $fillable = [
        'lingote_estado_nombre',
        'lingote_estado_descripcion',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/lingote-estados/'.$this->getKey());
    }
}

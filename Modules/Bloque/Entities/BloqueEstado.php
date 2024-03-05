<?php

namespace Modules\Bloque\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloqueEstado extends Model
{
    use HasFactory;
    protected $table = 'bloque_estado';
    protected $fillable = [
        'bloque_estado_nombre'
        ,'bloque_estado_descripcion'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Bloque\Database\factories\BloqueEstadoFactory::new();
    }
}

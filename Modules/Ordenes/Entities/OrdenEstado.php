<?php

namespace Modules\Ordenes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenEstado extends Model
{
    use HasFactory;

    protected $table = "orden_estado";
    protected $fillable = [
        "orden_estado_nombre"
        ,"orden_estado_descripcion"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ordenes\Database\factories\OrdenEstadoFactory::new();
    }
}

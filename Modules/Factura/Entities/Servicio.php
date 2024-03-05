<?php

namespace Modules\Factura\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        "servicio_nombre"
        ,"servicio_descripcion"
        ,"servicio_precio"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Factura\Database\factories\ServicioFactory::new();
    }
}

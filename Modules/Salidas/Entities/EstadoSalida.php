<?php

namespace Modules\Salidas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado_Salida extends Model
{
    use HasFactory;
    protected $table = "salida_estado";
    protected $fillable = [
        "salida_estado_nombre"
        ,"salida_estado_descripcion"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Salidas\Database\factories\EstadoSalidaFactory::new();
    }
}

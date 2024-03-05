<?php

namespace Modules\Salidas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalidaRegistro extends Model
{
    use HasFactory;
    protected $table = "salida_registro";
    protected $fillable = [
        "salida_regitro_log"
        ,"salida_id"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Salidas\Database\factories\SalidaRegistroFactory::new();
    }
}

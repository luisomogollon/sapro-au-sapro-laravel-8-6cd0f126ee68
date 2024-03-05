<?php

namespace Modules\Barra\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarraRegistro extends Model
{
    use HasFactory;

    protected $table = "barra_registro";
    protected $fillable = [
        "barra_id"
        ,"barra_registro_log"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Barra\Database\factories\BarraRegistroFactory::new();
    }
}

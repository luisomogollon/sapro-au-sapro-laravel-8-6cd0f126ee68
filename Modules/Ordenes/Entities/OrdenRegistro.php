<?php

namespace Modules\Ordenes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenRegistro extends Model
{
    use HasFactory;
    protected $table = "orden_registro";
    protected $fillable = [
        "orden_id"
        ,"orden_registro_log"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ordenes\Database\factories\OrdenRegistroFactory::new();
    }
}

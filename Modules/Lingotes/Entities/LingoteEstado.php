<?php

namespace Modules\Lingotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LingoteEstado extends Model
{
    use HasFactory;
    protected $table = "lingote_estado";
    protected $fillable = [
        'lingote_estado_nombre'
        ,'lingote_estado_descripcion'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Lingotes\Database\factories\EstadoLingoteFactory::new();
    }
}

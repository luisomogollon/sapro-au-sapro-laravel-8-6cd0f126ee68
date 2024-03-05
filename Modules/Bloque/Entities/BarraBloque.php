<?php

namespace Modules\Bloque\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarraBloque extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Bloque\Database\factories\BarraBloqueFactory::new();
    }
}

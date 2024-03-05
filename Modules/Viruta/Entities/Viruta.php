<?php

namespace Modules\Viruta\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Viruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'viruta_muestra'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Viruta\Database\factories\VirutaFactory::new();
    }
}

<?php

namespace Modules\Lingotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LingoteRegistro extends Model
{
    use HasFactory;
    protected $table = "lingote_registro";
    protected $fillable = [
        'lingote_registro_log'
        ,'lingote_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Lingotes\Database\factories\LingoteRegistroFactory::new();
    }
}

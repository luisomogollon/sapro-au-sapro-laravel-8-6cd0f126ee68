<?php

namespace Modules\Lingotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
class BarraLingote extends  Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $table = "barra_lingote";
    protected $fillable = [
        'barra_lingote_cantidad'
        ,'barra_id'
        ,'lingote_id'
        ,'user_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Lingotes\Database\factories\BarraLingoteFactory::new();
    }
}

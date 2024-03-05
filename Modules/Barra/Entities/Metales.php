<?php

namespace Modules\Barra\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Barra\Entities\Barra;
class Metales extends Model
{
    use HasFactory;

    protected $fillable = [
        'metal_codigo'
        ,'metal_nombre'
        ,'metal_simbolo'
        ,'metal_descripcion'
    ];
    protected $table = "metales";

    protected static function newFactory()
    {
        return \Modules\Barra\Database\factories\MetalesFactory::new();
    }

    public function barras(){
        return $this->belongsToMany(Barra::class
                                    ,"barra_metal"
                                    ,"metal_id"
                                    ,"barra_id")
                                    ->withTimestamps()
                                    ->withPivot("barra_metal_contenido");
    }
}

<?php

namespace Modules\Barra\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Barra\Entities\Barra;

class BarraEstado extends Model
{
    use HasFactory;

    protected $fillable = [
        "barra_estado_nombre"
        ,"barra_estado_descripcion"
    ];
    protected $table = "barra_estado";

    protected static function newFactory()
    {
        return \Modules\Barra\Database\factories\BarraEstadoFactory::new();
    }

    public function barras (){
        return $this->hasMany(Barra::class
                            ,"barra_estado_id"
                            ,'id');
    }
}

<?php

namespace Modules\Ordenes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comision extends Model
{
    use HasFactory;
    protected $table = "comisiones";
    protected $fillable = [
        'comision_monto'
        ,'comision_planta'
        ,'comision_cvm'
        ,'comision_descripcion'
        ,'created_by_admin_user_id'
        ,'updated_by_admin_user_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ordenes\Database\factories\ComisionFactory::new();
    }
}

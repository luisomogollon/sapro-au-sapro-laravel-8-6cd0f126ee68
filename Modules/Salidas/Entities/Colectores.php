<?php

namespace Modules\Salidas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colectores extends Model
{
    use HasFactory;
    protected $table = "colectores";
    protected $fillable = [
        'colector_nombres'
        ,'colector_apellidos'
        ,'colector_cedula'
        ,'created_by_admin_user_id'
        ,'updated_by_admin_user_id'
        ,'cliente_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Salidas\Database\factories\ColectoresFactory::new();
    }
}

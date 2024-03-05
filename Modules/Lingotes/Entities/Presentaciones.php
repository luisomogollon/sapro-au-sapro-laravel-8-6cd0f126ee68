<?php

namespace Modules\Lingotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentaciones extends Model
{
    use HasFactory;
    protected $table = "presentaciones";
    protected $fillable = [
        'presentacion_nombre'
        ,'presentacion_peso'
        ,'created_by_admin_user_id'
        ,'updated_by_admin_user_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Lingotes\Database\factories\PresentacionesFactory::new();
    }
}

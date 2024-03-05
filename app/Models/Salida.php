<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;
use App\Models\Lingote;
use App\Models\Colectore;
use App\Models\SalidaEstado;
class Salida extends Model
{
use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;
    protected $fillable = [
        'salida_referencia',
        'activated',
        'salida_descripcion',
        'colector_id',
        'salida_estado_id',
        'created_by_admin_user_id',
        'updated_by_admin_user_id',
        'user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/salidas/'.$this->getKey());
    }

    public function lingotes(){
        return $this->hasMany(Lingote::class
                              ,'salida_id'
                              ,'id');
    }

    public function colectores(){
        return $this->belongsTo(Colectore::class
                                ,'colector_id'
                                ,'id');
    }

    public function salidaEstado (){
        return $this->belongsTo(SalidaEstado::class
                                ,'salida_estado_id'
                                ,'id');
    }
}

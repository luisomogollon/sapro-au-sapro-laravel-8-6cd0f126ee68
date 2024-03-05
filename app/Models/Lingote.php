<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;

class Lingote extends Model
{
    use UpdatedByAdminUserTrait;
    protected $fillable = [
        'lingote_peso',
        'lingote_troquelado_codigo',
        'salida_id',
        'presentacion_id',
        'lingote_estado_id',
        'updated_by_admin_user_id',
        'user_id',
        'lingote_descripcion',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = [
        'resource_url'
        ,'lingote_codigo'
    ];

    /* ************************ ACCESSOR ************************* */

    public function getLingoteCodigoAttribute()
    {
        return $this->lingote_troquelado_codigo?? 'ID:'.$this->id.'-'.$this->lingote_peso;
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/lingotes/'.$this->getKey());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;

class Comisione extends Model
{
use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;
    protected $fillable = [
        'comision_cvm',
        'comision_descripcion',
        'comision_monto',
        'comision_planta',
        'created_by_admin_user_id',
        'updated_by_admin_user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/comisiones/'.$this->getKey());
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;

class Viruta extends Model
{
use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;
    protected $fillable = [
        'created_by_admin_user_id',
        'updated_by_admin_user_id',
        'viruta_muestra',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/virutas/'.$this->getKey());
    }
}

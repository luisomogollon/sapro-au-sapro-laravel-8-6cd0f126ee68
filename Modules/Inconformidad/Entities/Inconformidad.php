<?php

namespace Modules\Inconformidad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inconformidad extends Model
{
    use HasFactory;
    protected $table = 'inconformidades';
    protected $fillable = [
        'inconformidad_tipo'
        ,'activated'
        ,'description'
        ,'model_id'
        ,'model_type'
        ,'user_id'
    ];
    

    public function inconforme(){
        return $this->morphTo(__FUNCTION__,'model_type', 'model_id');
    }

    protected static function newFactory()
    {
        return \Modules\Inconformidad\Database\factories\InconformidadFactory::new();
    }
}

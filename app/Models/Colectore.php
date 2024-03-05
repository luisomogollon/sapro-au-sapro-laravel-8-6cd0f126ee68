<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Modules\Clientes\Entities\Cliente;

class Colectore extends  Model implements HasMedia
{
    use CreatedByAdminUserTrait;
    use UpdatedByAdminUserTrait;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    protected $with = ['media'];
    protected $fillable = [
        'colector_nombres',
        'colector_apellidos',
        'colector_cedula',
        'created_by_admin_user_id',
        'updated_by_admin_user_id',
        'cliente_id'

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'url_foto'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/colectores/' . $this->getKey());
    }

    public function getUrlFotoAttribute()
    {
        return $this->getFirstMedia('cedulas')?url("/media/{$this->getFirstMedia('cedulas')->id}/{$this->getFirstMedia('cedulas')->file_name}"):"deber cargar imagen";
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('cedulas')
             ->singleFile()
             ->withResponsiveImages();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('thumb_75')
            ->width(75)
            ->height(75)
            ->fit('crop', 75, 75)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();

        $this->addMediaConversion('thumb_150')
            ->width(150)
            ->height(150)
            ->fit('crop', 150, 150)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class
                                ,'cliente_id'
                                ,'id');
    }

    public function receptor(){
        return $this->belongsTo(Cliente::class
                                ,'receptor_id'
                                ,'id');
    }
}

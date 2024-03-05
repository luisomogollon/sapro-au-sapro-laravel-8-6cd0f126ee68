<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lingote;
use App\Models\Colectore;
use App\Models\Ordene;
use App\Models\Comisione;
use App\Models\Presentacione;
class Cliente extends Model
{
    protected $fillable = [
        'cliente_correo',
        'cliente_nombre',
        'cliente_rif',
        'cliente_telf',
        'cliente_tipo',
        'comision_id',
        'enabled',
        'presentacion_id',
        'user_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $with =
            [
                'lingotes'
                ,'colectores'
                ,'ordenes'
           ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/' . $this->getKey());
    }


    public function lingotes()
    {
        return $this->hasManyThrough(
            Lingote::class,
            Ordene::class,
            'receptor_id',
            'orden_id',
            'id',
            'id'
        )->where('salida_id', '=', null)
            ->where('lingote_estado_id', '=', 4);
    }

    public function colectores()
    {
        return $this->hasMany(
            Colectore::class,
            'cliente_id',
            'id'
        );
    }
    public function presentaciones()
    {
        return $this->belongsTo(
            Presentacione::class,
            "presentacion_id",
            "id"
        );
    }
    public function comisiones()
    {
        return $this->belongsTo(
            Comisione::class,
            "comision_id",
            "id"
        );
    }

    public function ordenes(){
        return $this->hasMany(Ordene::class,
                              "cliente_id",
                              "id")->whereHas("barrasAnalizadas");
    }

    public function scopeOrdenesReporte($query){
        return $query->withOnly('ordenes')->whereHas('ordenes', fn ($q) =>
        $q->barras());
    }
}

<?php

namespace Modules\Clientes\Entities;

use Modules\Clientes\Entities\Direccion;
use Modules\Ordenes\Entities\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Ordenes\Entities\Comision;
use Modules\Lingotes\Entities\Presentaciones;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_rif'
        ,'cliente_correo'
        ,'cliente_nombre'
        ,'cliente_telf'
        ,"user_id"
        ,'comision_id'
        ,'cliente_tipo'
        ,'presentacion_id'
    ];
    protected $table ="clientes";

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return \Modules\Clientes\Database\factories\ClienteFactory::new();
    }

    public function direcciones(){
        return $this->hasMany(Direccion::class,
                              'cliente_id',
                              'id');
    }

    public function ordenes(){
        return $this->hasMany(Orden::class,
                              "cliente_id",
                              "id");
    }

    public function comision (){
        return $this->belongsTo(Comision::class,
                                'comision_id'
                                ,'id');
    }

    public function receptor(){
        return $this->hasMany(Orden::class,
                              "receptor_id",
                              "id");
    }

    public function presentacion () {
        return $this->belongsTo(Presentaciones::class
                                ,"presentacion_id"
                                ,"id");
    }

}

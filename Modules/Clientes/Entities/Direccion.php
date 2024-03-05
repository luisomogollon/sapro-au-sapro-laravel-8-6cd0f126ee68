<?php

namespace Modules\Clientes\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clientes\Entities\Cliente;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'direccion_alias'
        ,'direccion_linea_1'
        ,'direccion_linea_2'
        ,'direccion_codigo_postal'
        ,'direccion_estado'
        ,'direccion_ciudad'
        ,'direccion_telf'
        ,'cliente_id'
    ];
    protected $table ="direcciones";
    
    protected static function newFactory()
    {
        return \Modules\Clientes\Database\factories\DireccionFactory::new();
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,
                                'cliente_id',
                                'id');
    }
}

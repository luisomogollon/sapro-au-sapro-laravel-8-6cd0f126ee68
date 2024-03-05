<?php

namespace Modules\Bancos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Bancos\Entities\Movimiento;

class Banco extends Model
{
    use HasFactory;
    protected $table = "bancos";
    protected $fillable = [
        'banco_mineral'
        ,'banco_cuenta'
        ,'banco_cantidad_disponible'
        ,'banco_cantidad_retiros'
        ,'banco_cantidad_depositos'
        ,'banco_comision'

    ];

    protected static function newFactory()
    {
        return \Modules\Bancos\Database\factories\BancoFactory::new();
    }

    public function movimientos()
    {
        return $this->hasMany(
            Movimiento::class,
            "banco_id",
            "id"
        );
    }
}

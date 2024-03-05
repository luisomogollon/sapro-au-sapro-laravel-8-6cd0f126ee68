<?php

namespace Modules\Factura\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Ordenes\Entities\Orden;

class Factura extends Model
{
    use HasFactory;
    protected $table = "facturas";
    protected $fillable = [
        "factura_detalle"
        ,"orden_id"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Factura\Database\factories\FacturaFactory::new();
    }

    public function orden(){
        return $this->belongsTo(Orden::class,
                             'orden_id',
                             'id'
                            );
    }
}

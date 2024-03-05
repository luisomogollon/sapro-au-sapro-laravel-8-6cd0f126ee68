<?php

namespace Modules\Ordenes\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Factura\Entities\Factura;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class CrearFacturaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $current = Carbon::now()->toDateTimeString();
        $orden= $event->orden;
        $array = array();
        foreach ($orden->barras as $barra => $value) {
            array_push($array,
             ["id" => $value->id
             ,"barra_codigo" => $value->barra_codigo
             ,"barra_peso_ingreso" => $value->barra_peso_ingreso
             ,"barra_und_masa" => $value->barra_und_masa
             ,"barra_ley_final" => $value->barra_ley_final
             ,"barra_oro_cliente" => $value->barra_oro_cliente
             ]);
        }
        $save = DB::insert('insert into facturas ( orden_id, factura_detalle, created_at, updated_at) 
        values (?, ?, ?, ?)'
                , [$orden->id,json_encode($array),$current,$current]);
        return $save;
    }
}

<?php

namespace Modules\Bloque\Listeners;

use Modules\Bloque\Events\BloqueGranallado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class BloqueProcesadoListener {


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
     * @param object $event
     * @return void
     */
    public function handle( $event)
    {
        Log::info('enviar refinado2');
        $bloque = $event->bloque;
        $bloque->enviarOrdenFundicion();
        $bloque->otrosMetalesBanco();
        Log::info('termina2');
    }
}
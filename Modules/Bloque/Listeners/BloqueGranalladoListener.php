<?php

namespace Modules\Bloque\Listeners;

use Modules\Bloque\Events\BloqueGranallado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class BloqueGranalladoListener
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
     * @param object $event
     * @return void
     */
    public function handle( $event)
    {
        Log::info('inicia');
        $bloque = $event->bloque;
        $bloque->calcularValoresBarra();
        Log::info('termina');
    }
}

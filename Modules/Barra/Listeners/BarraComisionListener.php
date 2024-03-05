<?php

namespace Modules\Barra\Listeners;

use Modules\Barra\Events\BarraComisionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class BarraComisionListener
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
     * @param BarraComisionEvent $event
     * @return void
     */
    public function handle(BarraComisionEvent $event)
    {
        //
        Log::info('inicia barra');
        $barra = $event->barra;
        $barra->oroComisionReal();
        Log::info('termina barra');
    }
}

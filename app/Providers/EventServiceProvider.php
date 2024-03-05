<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Modules\Bloque\Events\BloqueGranallado;
use Modules\Bloque\Listeners\BloqueGranalladoListener;
use Modules\Bloque\Events\BloqueProcesado;
use Modules\Bloque\Listeners\BloqueProcesadoListener;
use Modules\Barra\Events\BarraComisionEvent;
use Modules\Barra\Listeners\BarraComisionListener;
use Modules\Bancos\Events\MovimientoTrue;
use Modules\Bancos\Listeners\MovimientoTrueListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BloqueGranallado::class => [
            BloqueGranalladoListener::class,
        ],
        BloqueProcesado::class => [
            BloqueProcesadoListener::class,
        ],
        BarraComisionEvent::class => [
            BarraComisionListener::class,
        ],
        MovimientoTrue::class => [
            MovimientoTrueListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

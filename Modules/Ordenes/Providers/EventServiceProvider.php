<?php

namespace Modules\Ordenes\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Ordenes\Events\OrdenCrearFactura;
use Modules\Ordenes\Listeners\CrearFacturaListener;
class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        OrdenCrearFactura::class => [
            CrearFacturaListener::class,
        ]
    ];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}

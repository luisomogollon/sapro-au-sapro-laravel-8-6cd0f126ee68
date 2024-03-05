<?php

namespace Modules\Bloque\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Bloque\Events\BloqueGranallado;
use Modules\Bloque\Listeners\BloqueGranalladoListener;

class EventServiceProvider extends ServiceProvider
{

   /* protected $listen = [
        BloqueGranallado::class => [
            BloqueGranalladoListener::class,
        ]
        ];*/
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

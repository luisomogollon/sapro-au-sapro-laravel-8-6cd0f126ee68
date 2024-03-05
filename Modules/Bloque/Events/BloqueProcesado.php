<?php

namespace Modules\Bloque\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Log;
use Modules\Bloque\Entities\Bloque;

class BloqueProcesado {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Bloque $bloque;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bloque $bloque)
    {
        Log::info("bloque procesado");

        $this->bloque = $bloque;
        Log::warning("procesado");
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}

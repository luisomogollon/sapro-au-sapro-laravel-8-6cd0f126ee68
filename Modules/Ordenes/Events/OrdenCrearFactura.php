<?php

namespace Modules\Ordenes\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Ordenes\Entities\Orden;
use Illuminate\Support\Facades\Log;
class OrdenCrearFactura
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Orden $orden;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Orden $orden)
    {
        $this->orden=$orden;
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

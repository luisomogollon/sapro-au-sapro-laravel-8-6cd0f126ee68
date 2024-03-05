<?php

namespace Modules\Barra\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Log;
use Modules\Barra\Entities\Barra;

class BarraComisionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Barra $barra;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Barra $barra)
    {
        Log::info("wvwnto barra");
        $this->barra = $barra;
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

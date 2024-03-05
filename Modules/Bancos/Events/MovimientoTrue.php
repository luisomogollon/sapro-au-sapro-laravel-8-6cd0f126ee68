<?php

namespace Modules\Bancos\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Log;
use App\Models\Movimiento;

class MovimientoTrue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Movimiento $movimiento;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Movimiento $movimiento)
    {
        Log::info('trigger movimientos evento');
        $this->movimiento = $movimiento;
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

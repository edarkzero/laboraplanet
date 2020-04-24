<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Proyecto; 
class Broadcastnotificacion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $proyecto; 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PDF_arc(p, x, y, r, alpha, beta)rivateChannel('channel-name');
        return new Channel('notificacion');
    }
}

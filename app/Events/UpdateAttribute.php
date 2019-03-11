<?php

namespace App\Events;

use App\Models\UserAnimalAttribute;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateAttribute implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var UserAnimalAttribute
     */
    public $attribute;

    /**
     * Create a new event instance.
     *
     * @param UserAnimalAttribute $attribute
     * @return void
     */
    public function __construct(UserAnimalAttribute $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('update-attribute');
    }

    public function broadcastWith()
    {
        return [ 'attribute' => $this->attribute ];
    }
}

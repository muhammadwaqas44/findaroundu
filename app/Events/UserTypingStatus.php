<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserTypingStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $receiver_id;
    public $conversation_id;
    public $text;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($receiver_id,$conversation_id,$text)
    {
        $this->receiver_id = $receiver_id;
        $this->conversation_id = $conversation_id;
        $this->text = $text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channel = $this->receiver_id.'-'.$this->conversation_id;
        $string_conversation = strval($channel);
        return new Channel($string_conversation);
    }

    public function broadcastAs()
    {
        return 'user_typing';
    }
}

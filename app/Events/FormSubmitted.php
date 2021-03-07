<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FormSubmitted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $text;
    public $receiver_id;
    public $type;
    public $conversation_id;
    public $fileDownload;
    public $created_at;
    public $profile_image;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text,$type,$receiver_id,$conversation_id,$fileDownload,$created_at,$profile_image)
    {
        $this->text = $text;
        $this->receiver_id = $receiver_id;
        $this->type = $type;
        $this->conversation_id = $conversation_id;
        $this->fileDownload = $fileDownload;
        $this->created_at = $created_at;
        $this->profile_image = $profile_image;
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
        return 'send-chat';
    }
}

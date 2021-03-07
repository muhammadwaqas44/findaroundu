<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public function senderInfo()
    {
        return $this->belongsTo('App\User','sender');
    }

    public function receiverInfo()
    {
        return $this->belongsTo('App\User','receiver');
    }

    public function getMessage()
    {
        return $this->hasMany('App\ChatMessage','conversation_id');
    }
}

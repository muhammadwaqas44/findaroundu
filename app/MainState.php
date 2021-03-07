<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainState extends Model
{
    public function city()
    {
        return $this->hasMany('App\MainCity', 'state_id');
    }
}

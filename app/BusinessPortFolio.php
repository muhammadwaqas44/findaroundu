<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPortFolio extends Model
{
    protected $guarded = [];
    public function getProfileImageAttribute($profile_image)
    {
        return asset($profile_image);
    }
}

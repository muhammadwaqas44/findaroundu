<?php

namespace App;

use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use FormatDates;

    protected $guarded = [];


    public function user(){
        return $this->belongsTo('App\User');
    }


    public function getPercentageAttribute($profile_image)
    {
        if ($profile_image != null) {
            return asset($profile_image);
        } else {
            return asset('main-admin/images/default.png');
        }
    }


    public function likes()
    {
        return $this->hasMany('App\Like');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCity extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','image','state_id'];

    public function address(){
        return $this->hasMany('App\Address');
    }

    public function getImageAttribute($image)
    {
        if ($image != null) {
            return asset($image);
        } else {
            return asset('main-admin/images/default.png');
        }
    }

    public function business()
    {
        return $this->belongsToMany('App\Business', 'addresses', 'main_city_id', 'business_id');
    }

    public function adds()
    {
        return $this->belongsToMany('App\Add', 'addresses', 'main_city_id', 'add_id');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'addresses', 'main_city_id', 'service_id');
    }
}

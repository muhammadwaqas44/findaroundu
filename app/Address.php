<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['add_id','business_id','service_id','main_country_id','main_state_id','main_city_id','address','user_id'];


    public function country()
    {
        return $this->belongsTo('App\MainCountry', 'main_country_id');
    }

    public function city()
    {
        return $this->belongsTo('App\MainCity', 'main_city_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



    public function business()
    {
        return $this->belongsTo('App\Business', 'business_id');
    }

    public function adds()
    {
        return $this->belongsTo('App\Add', 'add_id');
    }

    public function services()
    {
        return $this->belongsTo('App\Add', 'service_id');
    }

}

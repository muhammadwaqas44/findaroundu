<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCountry extends Model
{
    public function states()
    {
        return $this->hasMany('App\MainState', 'country_id');
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'pivot_category_country', 'country_id', 'category_id')->withPivot('order_no', 'type')->withTimestamps();
    }

    public function selectedCities(){
        return $this->belongsToMany('App\MainCity', 'pivot_country_city', 'country_id', 'city_id')->withPivot('order_no')->withTimestamps();
    }
}

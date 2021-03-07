<?php

namespace App\Subscription;

use App\MainCity;
use Illuminate\Database\Eloquent\Model;

class SubscriptionBillingAddress extends Model
{
    protected $fillable = ['subscription_id','email','first_name','last_name','phone','address','city','zip','country_id','state'];

    public function city()
    {
        return $this->hasOne(MainCity::class, 'city_id');
    }


}

<?php

namespace App\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPricingModel extends Model
{
    protected $guard = [];
    public function scopeAddons($query)
    {
        return $query->where('type', 'Addon');
    }


    public function scopePlans($query)
    {
        return $query->where('type', 'Plan');
    }

}

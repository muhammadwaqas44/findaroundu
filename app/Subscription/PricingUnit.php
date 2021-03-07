<?php

namespace App\Subscription;

use Illuminate\Database\Eloquent\Model;

class PricingUnit extends Model
{
    protected $guarded = [];

    public function planFeature()
    {
        return $this->belongsTo('App\Subscription\SubscriptionPlanFeature','subscription_plan_feature_id');
    }
}

<?php

namespace App\Subscription;

use App\Subscription\SubscriptionPlan;
use App\Subscription\Site;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanFeature extends Model
{
   protected $guarded = [];



    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function site()
    {
        return $this->belongsTo('App\Subscription\Site', 'site_id');
    }

    public function unit()
    {
        return $this->hasMany('App\Subscription\PricingUnit', 'subscription_plan_feature_id');
    }



}

<?php

namespace App\Subscription;

use App\Subscription\SubscriptionPlanFeature;
use App\Subscription\SubscriptionPlanType;
use App\Subscription\SubscriptionPlanPivotPricingModel;

use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use  FormatDates;
    protected $guarded = [];


    public function subscriptions()
    {
        return $this->belongsToMany('App\Subscription\Subscription', 'subscription_pivot_user_subscriptions', 'plan_id', 'subscription_id');
    }


    public function packages()
    {
        return $this->hasMany(SubscriptionPlanPackage::class,  'plan_id' );
    }

    public function pricingModel()
    {
        return $this->belongsToMany('App\Subscription\SubscriptionPricingModel', 'subscription_plan_pivot_pricing_models', 'plan_id', 'pricing_model_id')->withPivot('price','setup_price');
    }

    public function planType(){
        return $this->belongsTo(SubscriptionPlanType::class);
    }

    public function planFeatures(){
        return $this->hasMany(SubscriptionPlanFeature::class);
    }

    public function planAddOn()
    {
        return $this->belongsToMany('App\Subscription\SubscriptionAddon','subscription_pivot_addon_plans','subscription_plan_id','subscription_addon_id');
    }

}

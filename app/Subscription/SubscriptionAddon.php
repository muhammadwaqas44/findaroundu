<?php

namespace App\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionAddon extends Model
{

    protected $fillable = ['addon_id','total_price','name','created_by','invoice_name','description','price_model_id','period','period_unit','charge_type','addon_type_id','invoice_notes','comments'];

    public function getChargeTypeAttribute(){
        return ucwords($this->attributes['charge_type']);
    }

    public function pricingModel()
    {
        return $this->belongsToMany('App\Subscription\SubscriptionPricingModel', 'subscription_plan_pivot_pricing_models', 'addon_id', 'pricing_model_id')->withPivot('price','setup_price');
    }


    public function addonFeatures(){
        return $this->hasMany(SubscriptionPlanFeature::class,'subscription_addon_id');
    }


}

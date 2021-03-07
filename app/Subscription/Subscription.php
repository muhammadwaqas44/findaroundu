<?php

namespace App\Subscription;

use App\Scopes\ActiveScope;
use App\Subscription\SubscriptionPlan;
use App\User;
use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use FormatDates;

    protected $guarded = [];


    public function subscriber()
    {
        return $this->belongsTo(User::class, 'user_id')->withoutGlobalScope(ActiveScope::class);
    }

    public function billingInfo()
    {
        return $this->hasOne(SubscriptionBillingAddress::class, 'subscription_id');
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }



    public function addons()
    {
        return $this->belongsToMany(SubscriptionAddon::class, 'subscription_pivot_addons','subscription_id','subscription_addon_id')->withPivot('subscription_addon_id');
    }





    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withoutGlobalScope(ActiveScope::class);
    }

    public function invoices()
    {
        return $this->hasMany(SubscriptionInvoice::class, 'subscription_id');
    }
}

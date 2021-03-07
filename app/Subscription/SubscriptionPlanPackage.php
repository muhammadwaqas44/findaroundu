<?php

namespace App\Subscription;

use App\Subscription\SubscriptionPlan;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanPackage extends Model
{
    protected $fillable = [
        'name',
        'module_id',
        'plan_id',
        'stripe_plan_id'

    ];
//    protected $connection = "user_databases";

    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function subscription(){
        return $this->hasMany(Subscription::class,'subscription_plan_package_id');
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }

}

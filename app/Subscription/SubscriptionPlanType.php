<?php

namespace App\Subscription;

use App\Subscription\SubscriptionPlan;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanType extends Model
{
    public function plans(){
        return $this->hasMany(SubscriptionPlan::class);
    }



}

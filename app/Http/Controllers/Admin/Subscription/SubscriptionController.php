<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Subscription\Subscription;
use App\Subscription\SubscriptionPlan;
use App\Services\StripeServices;
use SubscribersService;
use Auth;
use App\Subscription\SubscriptionPlanPackage;
use App\MainCountry;
use Illuminate\Http\Request;
use App\Services\SubscriptionServices;
use App\User;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{


    public function applySubscription(Request $request, SubscriptionServices $subscriptionServices,StripeServices $stripeServices)
    {
        $planData = SubscriptionPlanPackage::where('id', $request->package_id)->first();

        $subscriptionStartDate = date('Y-m-d');

        if($planData->plan->trial_limit_count != null) {
            $trialLimitCount = $planData->plan->trial_limit_count;
            if ($planData->plan->trial_period_unit == 'Day') {
                $subscriptionStartDate = date('Y-m-d', strtotime($subscriptionStartDate. " + $trialLimitCount days"));
            }else if ($planData->plan->trial_period_unit == 'Month'){
                $subscriptionStartDate = date('Y-m-d', strtotime($subscriptionStartDate . "+ $trialLimitCount months") );
            }
        }else{
            $trialLimitCount = 0;
        }

        $newBillingCycleCount = $planData->plan->bill_every_count;

        if($planData->plan->bill_period_unit == 'Week'){
            $subscriptionEndDate = date('Y-m-d', strtotime($subscriptionStartDate . "+ $newBillingCycleCount weeks") );
        }elseif ($planData->plan->bill_period_unit == 'Month'){
            $subscriptionEndDate = date('Y-m-d', strtotime($subscriptionStartDate . "+ $newBillingCycleCount months") );
        }elseif ($planData->plan->bill_period_unit == 'Year'){
            $subscriptionEndDate = date('Y-m-d', strtotime($subscriptionStartDate . "+ $newBillingCycleCount years") );
        }

        $stripeSubscriptionId = "";

        if (isset($request->payment_method)) {

            $stripSubscription = $stripeServices->userSubscription(User::find($request->user_id),$request,$trialLimitCount);
            $stripeSubscriptionId = $stripSubscription['subscription_id'];
        }

        $subscriptionServices->createSubscription(User::find($request->user_id)->id, $request, null,$subscriptionStartDate,$subscriptionEndDate,$stripeSubscriptionId);

        return redirect()->back();
    }



}

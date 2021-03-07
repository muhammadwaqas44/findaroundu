<?php

namespace App\Http\Controllers\Agent;

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
    public function createNewSubscription($customerId, Request $request, SubscriptionServices $subscriptionServices)
    {
        if ($request->isMethod('get')) {
            $data['customer'] = User::find($customerId);
            $data['plan'] = SubscriptionPlan::all();
            $data['countries'] = MainCountry::all();
            return view('Admin.Subscription.add-new-subscription', compact('data'));
        } else {
            $subscriptionServices->createSubscription($customerId, $request);
            return redirect()->route('admin.all-subscription');
        }
    }


    public function cancelSubscription($subscriptionId, SubscriptionServices $subscriptionServices){
        $subscriptionServices->cancelSubscription($subscriptionId);
        return redirect()->back();
    }

    public function cancelAgentSubscription($subscriptionId, SubscriptionServices $subscriptionServices){
        $subscriptionServices->cancelAgentSubscription($subscriptionId);
        return redirect()->back();
    }

    public function activateSubscription($subscriptionId, SubscriptionServices $subscriptionServices){
        $subscriptionServices->activateSubscription($subscriptionId);
        return redirect()->back();
    }


    public function applySubscription(Request $request, SubscriptionServices $subscriptionServices,StripeServices $stripeServices){


        $planData = SubscriptionPlanPackage::where('id', $request->package_id)->first();
//dd($planData);
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



        $subscriptionServices->createSubscription($request->user_id, $request, null,$subscriptionStartDate,$subscriptionEndDate,$stripeSubscriptionId);

        return redirect()->back();
    }

    public function deleteSubscription($subscriptionId, SubscriptionServices $subscriptionServices){
        $subscriptionServices->deleteSubscription($subscriptionId);
        return redirect()->route('admin.all-subscription');
    }

    public function subscriptionDetail($subscriptionId){
        $data['subscription_detail'] = Subscription::find($subscriptionId);
        return view('Admin.Subscription.subscription-detail',compact('data'));
    }

    public function agentSubscriptionDetail($subscriptionId){
        $data['subscription_detail'] = Subscription::find($subscriptionId);
        return view('Agent.Subscription.subscription-detail',compact('data'));
    }


    public function allSubscription(SubscriptionServices $subscriptionServices, Request $request){
        $data['all_subscriptions'] = $subscriptionServices->getCustomerSubscriptions($request);
        return view('Admin.Subscription.all-subscriptions',compact('data'));
    }

    public function allAgentSubscription(SubscriptionServices $subscriptionServices, Request $request){
        $data['all_subscriptions'] = $subscriptionServices->getAgentCustomerSubscriptions($request);
        return view('Agent.Subscription.all-subscriptions',compact('data'));
    }


}

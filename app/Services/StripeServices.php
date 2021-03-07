<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use Stripe\Stripe;
use App\Subscription\SubscriptionPlanPackage;
use Stripe\Product;
use App\Subscription\SubscriptionPlan;

class StripeServices
{

    public function userSubscription($user, $request, $trialDays)
    {
        $stripeToken = $request->stripe_token;
        $stripeEmail = $request->email_;
        $packageId = $request->package_id;
        $planData = SubscriptionPlanPackage::find($packageId);
        $subscriptionId = null;
        Stripe::setApiKey('sk_test_yvSzX3EmHJMvHmfyCkkaD6ul');
        $customerId = null;
        if (empty($user->stripe_customer_id)) {
            $customerId = \Stripe\Customer::create([
                'email' => $stripeEmail,
                'source' => $stripeToken,
            ]);
            $user->stripe_customer_id = $customerId->id;
        }else{
            $customerId = $user->stripe_customer_id ;
        }


        $stripeCustomerId = $customerId;
        if ($planData) {
            $planPrice = $planData->plan->pricingModel->first()->pivot->price + $planData->plan->pricingModel->first()->pivot->setup_price;

            if ($planPrice > 0) {


                if ($planData->stripe_plan_id) {

                    if ($trialDays > 0) {
                        $subscription = \Stripe\Subscription::create([
                            'customer' => $stripeCustomerId,
                            'items' => [['plan' => $planData->stripe_plan_id]],
                            'trial_period_days' => $trialDays,
                        ]);
                    } else {


                        $subscription = \Stripe\Subscription::create([
                            'customer' => $stripeCustomerId,
                            'items' => [['plan' => $planData->stripe_plan_id]]
                        ]);


                    }


                    $subscriptionId = $subscription->id;
                    //                    $userNew->stripe_subscription_id = $subscriptionId;
                }
            }
        }
        return (['customer_id' => $stripeCustomerId, 'subscription_id' => $subscriptionId]);

    }

    // create product on stripe and return complete product
    public function addProduct($request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $product = Product::create([
            'name' => $request->name,
            'type' => 'service',
        ]);

        return $product;
    }


    // create plan on stripe and return complete array of plan
    public function addPlan($planId, $productId)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $planData = SubscriptionPlan::find($planId);

        $planPriceInDoller = $planData->pricingModel->first()->pivot->price + $planData->pricingModel->first()->pivot->setup_price;
        $billInterval = strtolower($planData->bill_period_unit);
        $intervalCount = $planData->bill_every_count;

        // create plan on stripe
        $stripePlan = \Stripe\Plan::create([
            'product' => $productId,
            'nickname' => $planData->name,
            'interval' => $billInterval,
            'interval_count' => $intervalCount,
            'currency' => 'USD',
            'amount' => $planPriceInDoller * 100,
        ]);

        return $stripePlan;
    }


}
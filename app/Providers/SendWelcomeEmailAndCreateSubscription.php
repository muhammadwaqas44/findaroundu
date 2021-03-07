<?php

namespace App\Providers;

use App\Subscription\Subscription;
use App\Subscription\SubscriptionBillingAddress;
use App\Subscription\SubscriptionPlanPackage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmailAndCreateSubscription
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreation $event
     * @return void
     */
    public function handle(UserCreation $event)
    {
        if(!empty($event)){
            $event = $event->user;
            if ($event->role->name == "User") {

                $subscription = Subscription::create([
                    "subscription_plan_package_id" => \App\Subscription\SubscriptionPlan::where('name','Free')->whereHas('pricingModel',function($query){
                        $query->where('price',0);
                    })->first()->packages->first()->id,
                    "name" => $event->name,
                    'user_id' => $event->id,
                    'created_by' => 1,
                    'subscription_plan_id' => 1,
                    'start_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'end_date' => \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d'),
                    'active' => "active",
                    'subscription_status' => "active",
                    'billing_count_cycles' => 1,
                    'shipping_to_bill_address' => 1,
                    'invoice_now' => "now"
                ]);

                SubscriptionBillingAddress::create([
                    'email' => $event->email,
                    'first_name' => $event->first_name,
                    'last_name' => $event->last_name,
                    'subscription_id' => $subscription->id,
                ]);
            }
        }



        //
    }
}

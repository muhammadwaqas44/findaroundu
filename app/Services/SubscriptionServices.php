<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\SubscriptionPivotAddon;
use App\Subscription\SubscriptionPlan;
use App\Subscription\SubscriptionPlanPackage;
use App\Subscription\SubscriptionSubscriber;
use App\User;
use Auth;
use App\Subscription\SubscriptionBillingAddress;
use App\Subscription\Subscription;
use Carbon\Carbon;
use App\Services\InvoiceServices;


class SubscriptionServices
{


    private $subscriptionPagination = 5;

    public function getAllSubscriptionsDataUserAdmin($user, $request)
    {

        $data['all_subscriptions'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['total_subscriptions'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['all_subscriptions_count'] = $user->subscriptions()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_subscriptions'] = $data['all_subscriptions']->where('title', 'like', '%' . $request->search . '%');
            $data['total_subscriptions'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_subscriptions_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_subscriptions'] = $data['all_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_subscriptions'] = $data['all_subscriptions']->simplePaginate($this->subscriptionPagination);
        $data['total_subscriptions'] = $data['total_subscriptions']->paginate($this->subscriptionPagination);
        $data['all_subscriptions_count'] = $data['all_subscriptions_count']->count();

        $request->flash();
        return $data;
    }

    public function getAllSubscriptionsDataUserAgent($user, $request)
    {

        $data['all_subscriptions'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['total_subscriptions'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['all_subscriptions_count'] = $user->subscriptions()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_subscriptions'] = $data['all_subscriptions']->where('title', 'like', '%' . $request->search . '%');
            $data['total_subscriptions'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_subscriptions_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('address')) {

            $address = $request->address;

            $data['all_subscriptions'] = $data['all_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($address) {
                $query->where('address', 'like', '%' . $address . '%');
            });
        }

        if ($request->filled('category_id')) {

            $categoryId = $request->category_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', 'like', '%' . $categoryId . '%');
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['categories'])->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($request->filled('city_id')) {

            $cityId = $request->city_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($cityId) {
                $query->where('main_city_id', $cityId);
            });
        }

        if ($request->filled('country_id')) {

            $countryId = $request->country_id;

            $data['all_subscriptions'] = $data['all_subscriptions']->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });


            $data['total_subscriptions'] = $data['total_subscriptions']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });

            $data['all_subscriptions_count'] = $data['all_subscriptions_count']->with(['address'])->whereHas('address', function ($query) use ($countryId) {
                $query->where('main_country_id', $countryId);
            });
        }

        $data['all_subscriptions'] = $data['all_subscriptions']->simplePaginate($this->subscriptionPagination);
        $data['total_subscriptions'] = $data['total_subscriptions']->paginate($this->subscriptionPagination);
        $data['all_subscriptions_count'] = $data['all_subscriptions_count']->count();

        $request->flash();
        return $data;
    }

    public function deleteSubscription($subscriptionId)
    {
        Subscription::destroy($subscriptionId);
        return 'success';
    }


    public function cancelSubscription($subscriptionId)
    {
        $userSubscription = Subscription::find($subscriptionId);

        $userSubscription->update(['subscription_status' => 'Cancelled', 'active' => 'cancel', 'cancelled_at' => Carbon::now()]);
        if (!empty($userSubscription->stripe_subscription_id)) {
            $cancel = \Stripe\Subscription::retrieve($userSubscription->stripe_subscription_id);
            $cancel->cancel();
        }
        return 'success';
    }

    public function cancelAgentSubscription($subscriptionId)
    {
        Subscription::find($subscriptionId)->update(['active' => 'cancel', 'cancelled_at' => Carbon::now()]);
        return 'success';
    }

    public function activateSubscription($subscriptionId)
    {
        Subscription::find($subscriptionId)->update(['active' => 'active']);
        return 'success';
    }

    public function getCustomerSubscriptions($request)
    {

        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_subscriptions'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_subscriptions'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_subscriptions'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_subscriptions'] = Subscription::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::where('name', 'like', '%' . $request->search . '%')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_subscriptions'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_subscriptions'] = Subscription::orderBy('id', 'asc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::orderBy('id', 'asc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_subscriptions'] = Subscription::orderBy('id', 'desc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::orderBy('id', 'desc')->paginate($this->subscriptionPagination);
            $data['all_plans_count'] = Subscription::orderBy('id', 'desc')->count();

        } else {

            $data['all_subscriptions'] = Subscription::orderBy('id', 'desc')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = Subscription::orderBy('id', 'desc')->paginate($this->subscriptionPagination);
            $data['all_subscriptions_count'] = Subscription::orderBy('id', 'desc')->count();

        }


        $request->flash();
        return $data;
    }

    public function getAgentCustomerSubscriptions($request)
    {


        $data['all_subscriptions'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->subscriptionPagination);
        $data['total_pages'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->subscriptionPagination);
        $data['all_subscriptions_count'] = Subscription::where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        $request->flash();
        return $data;
    }


    public function createSubscription($customerId, $request, $flag = null, $subscriptionStartDate = null, $subscriptionEndDate = null, $stripeSubscriptionId = null)
    {

//dd($request);
        $user = User::find($customerId);


        $invoiceServices = new InvoiceServices();
        $startDate = NULL;

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        if (!empty($request->shipping_to_bill_address)) {
            $billingAddress = $request->shipping_to_bill_address;
        } else {
            $billingAddress = 0;
        }
        $subscriptionStatus = 'Active';

        $package = SubscriptionPlanPackage::find($request->package_id);
        $billingCountCycles = $package->plan->bill_every_count;

        $invoiceNow = 1;


        $planId = $package->plan->id;
        $createdBy = 1;
        $userSubscription = $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first();


        if (!empty($userSubscription->stripe_subscription_id)) {
            $cancel = \Stripe\Subscription::retrieve($userSubscription->stripe_subscription_id);
            $cancel->cancel();


        }

        $user->subscriptions()->update(['cancelled_at' => Carbon::now(), 'active' => 'cancel', 'subscription_status' => 'Cancelled']);

        $subscription = Subscription::create([
            "subscription_plan_id" => $planId,
            "name" => $request->name . '_' . $stripeSubscriptionId,
            'user_id' => $user->id,
            'created_by' => $createdBy,
            'start_date' => $startDate,
            'end_date' => $subscriptionEndDate,
            'subscription_status' => $subscriptionStatus,
            'stripe_subscription_id' => $stripeSubscriptionId,
            'billing_count_cycles' => $billingCountCycles,
            'subscription_plan_package_id' => $package->id,
            'shipping_to_bill_address' => $billingAddress,
            'invoice_now' => $invoiceNow
        ]);
        $totalPrice = 0;$addonPrice = 0;
        if ($request->filled('addons')) {
            $subscription->addons()->attach($request->addons);
            foreach ($subscription->addons as $addon) {
                $addonPrice = $addonPrice + $addon->total_price;
            }
        }
        $totalPrice = $totalPrice + $addonPrice + $subscription->plan->pricingModel->first()->pivot->price + $subscription->plan->pricingModel->first()->pivot->setup_price;

        $subscription->update(['total_price' => $totalPrice]);
        if ($request->shipping_to_bill_address == 0) {

            SubscriptionBillingAddress::create([
                'email' => $request->email_r,
                'address' => Auth::user()->address->address,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'subscription_id' => $subscription->id,
                'zip' => $request->zip,
                'country_id' => $request->country_id,
                'city' => $request->city,
                'phone' => $request->phone
            ]);
        } else {
            if ($subscription->user->billingInfo()->count() != 0) {
                $addressBilling = $subscription->user->billingInfo()->select('first_name', 'last_name', 'email', 'phone', 'address', 'city', 'zip', 'state', 'user_id')->first()->toArray();
                SubscriptionBillingAddress::create(array_merge($addressBilling, ['country_id' => 1]));
            }
        }

        if (($package->plan->trial_limit_count == 0 || $package->plan->trial_limit_count == NULL) && $subscription->invoice_now == "now" && ($subscription->start_date == "" || Carbon::parse($subscription->start_date)->toDateString() == Carbon::now()->toDateString())) {
            $invoiceServices->createInvoice($subscription, $request);
        }
        return "success";
    }


}
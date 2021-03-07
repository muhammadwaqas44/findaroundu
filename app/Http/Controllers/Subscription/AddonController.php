<?php

namespace App\Http\Controllers\Subscription;

use App\Subscription\PricingUnit;
use App\Subscription\Subscription;
use App\Subscription\SubscriptionAddonsTypes;
use App\Subscription\SubscriptionAddonUnitFeature;
use App\Subscription\SubscriptionLog;
use App\Subscription\SubscriptionPricingModel;
use App\Subscription\Site;
use App\Subscription\SubscriptionAddon;
use App\Subscription\SubscriptionPivotAddon;
use Illuminate\Http\Request;
use App\Services\AddonServices;
use Stripe\Stripe;
use Auth;
use App\MainCountry;
use App\Http\Controllers\Controller;

class AddonController extends Controller
{
    public function allAddons(Request $request, AddonServices $addonServices)
    {

        $data['all_addons'] = $addonServices->getAddons($request);
        return view('admin.Subscribers.Addons.all-addons', compact('data'));
    }





    public function applyAddon(Request $request)
    {
        Stripe::setApiKey('sk_test_yvSzX3EmHJMvHmfyCkkaD6ul');
        $addonId = $request->addon_id;
        $token = $request->stripe_token;
        $subscription = Auth::user()->subscriptions()->where('active', 'active')->whereNull('cancelled_at')->first();
        if ($subscription->count() != 0) {
            $addon = SubscriptionAddon::find($addonId);
            if($addon->price_model_id == 1) {
                $charge = \Stripe\Charge::create([
                    'amount' => $addon->total_price * 100,
                    'currency' => 'usd',
                    'description' => $addon->name,
                    'source' => $token,
                ]);

                $subscription->update(['total_price' => $subscription->total_price + $addon->total_price]);

                SubscriptionPivotAddon::create(['subscription_id' => $subscription->id, 'subscription_addon_id' => $addonId]);
            }
            else{
                $total = 0;
//                dd($request->selected_feature);
                foreach($request->selected_feature as $selected_price)
                {
                    $pricing_unit = PricingUnit::find($selected_price);


                    if($pricing_unit){
                        $total += $pricing_unit->price;
                    }
                }
                $charge = \Stripe\Charge::create([
                    'amount' => $total * 100,
                    'currency' => 'usd',
                    'description' => $addon->name,
                    'source' => $token,
                ]);

                $subscription->update(['total_price' => $subscription->total_price + $total]);

                SubscriptionPivotAddon::create(['subscription_id' => $subscription->id, 'subscription_addon_id' => $addonId]);

                foreach($request->selected_feature as $selected_price)
                {
                    $pricing_unit = PricingUnit::find($selected_price);
                    if($pricing_unit) {
                        SubscriptionAddonUnitFeature::create(['pricing_unit_id' => $pricing_unit->id,
                            'price'=>$pricing_unit->price,
                            'quantity'=>$pricing_unit->qty,
                            'plan_feature_id'=>$pricing_unit->subscription_plan_feature_id,
                            'site_id' => $pricing_unit->planFeature->site_id,
                            'subscription_addon_id'=>$addonId]);
                    }
                }

            }
        }
        return redirect()->back();
    }


    public function frontAddons()
    {
        $data['countries'] = MainCountry::all();
        $data['addons'] = SubscriptionAddon::all();
        return view('User.Packages.front-addons', compact('data'));
    }

    public function deleteAddons($addonId, AddonServices $addonServices)
    {
        $data['addons'] = SubscriptionAddon::all();
        return view('User.Packages.front-addons', compact('data'));
    }

    public function deleteAddon($addonId, Request $request, AddonServices $addonServices)
    {
        $data['all_addons'] = $addonServices->deleteAddon($addonId);
        session()->flash('error','This Addon is registered against any subscription.');
        if($request->filled('flag')){
            return redirect()->route('admin.all-addons');
        }
        return redirect()->back();
        return view('admin.Subscribers.Addons', compact('data'));
//        return view('User.Customer.Addons', compact('data'));
    }


    public function addInvoiceNotes($addonId, Request $request, AddonServices $addonServices)
    {
        $addonServices->addInvoiceNotes($addonId, $request);
        return redirect()->back();
    }


    public function addCommentsNotes($addonId, Request $request, AddonServices $addonServices)
    {
        $addonServices->addCommentsNotes($addonId, $request);
        return redirect()->back();
    }

    public function deleteCommentNotes($addonId, AddonServices $addonServices)
    {
        $addonServices->deleteCommentNotes($addonId);
        return redirect()->back();
    }

    public function deleteInvoiceNotes($addonId, AddonServices $addonServices)
    {
        $addonServices->deleteInvoiceNotes($addonId);
        return redirect()->back();
    }

    public function addAddon(Request $request, AddonServices $addonServices)
    {
        if ($request->method() == "POST") {

            $data['all_addons'] = $addonServices->createAddon($request);
            return redirect()->route('admin.all-addons');
        } else {
            $data['addon_types'] = SubscriptionAddonsTypes::all();
            $data['sites'] = Site::all();
            $data['pricing_models'] = SubscriptionPricingModel::Addons()->get();

            return view('admin.Subscribers.Addons.add-new-addon', compact('data'));
        }

    }

    public function editAddon($addonId, Request $request, AddonServices $addonServices)
    {
        if ($request->method() == "POST") {
            $addonServices->editAddon($addonId, $request);

            return redirect()->route('user.customer.addon-detai',[$addonId]);
        }else{
            $data['subscription'] = SubscriptionPivotAddon::where('subscription_addon_id',$addonId)->get();

            $data['addon_detail'] = SubscriptionAddon::find($addonId);
            $data['addon_types'] = SubscriptionAddonsTypes::all();
            $data['pricing_models'] = SubscriptionPricingModel::all();
            return view('admin.Subscribers.Addons.edit-addon', compact('data'));
        }
    }

    public function addonDetail($addonId)
    {
        $data['addon_detail'] = SubscriptionAddon::find($addonId);
        return view('admin.Subscribers.Addons.addon-detail', compact('data'));
    }

    public function updateAddOn(Request $request)
    {

        SubscriptionLog::create(['subscription_addon_id'=>$request->addon_id,'json_array'=>json_encode(SubscriptionAddon::find($request->addon_id))]);
        SubscriptionAddon::where('id','=',$request->addon_id)->update($request->except('_token','addon_id'));
        return redirect()->route('admin.all-addons');
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\PricingUnit;
use App\Subscription\SubscriptionPlanFeature;
use App\Subscription\Site;
use Auth;
use App\Subscription\Subscription;
use App\Subscription\SubscriptionPlanPivotPricingModel;
use App\Subscription\SubscriptionAddon;
use Carbon\Carbon;


class AddonServices
{


    private $addonPagination = 5;


    public function editAddon($addonId, $request)
    {
        SubscriptionAddon::find($addonId)->update($request);
        return "success";
    }


    public function deleteAddon($addonId)
    {



        if (Subscription::whereHas('addons', function ($query) use ($addonId) {
                $query->where('subscription_addon_id', $addonId);
            })->get()->count() == 0) {

            SubscriptionAddon::destroy($addonId);
        }

        return 'success';
    }


    public function addInvoiceNotes($addonId, $request)
    {
        SubscriptionAddon::find($addonId)->update(['invoice_notes' => $request->invoice_notes]);
        return 'success';
    }

    public function deleteInvoiceNotes($addonId)
    {
        SubscriptionAddon::find($addonId)->update(['invoice_notes' => NULL]);
        return 'success';
    }


    public function addCommentsNotes($addonId, $request)
    {
        SubscriptionAddon::find($addonId)->update(['comments' => $request->comments]);
        return 'success';
    }

    public function deleteCommentNotes($addonId)
    {
        SubscriptionAddon::find($addonId)->update(['comments' => NULL]);
        return 'success';
    }


    public function getAddons($request)
    {

        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_addons'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_addons'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_addons'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_addons'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->subscriptionPagination);
            $data['total_pages'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->paginate($this->subscriptionPagination);
            $data['all_addons_count'] = SubscriptionAddon::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_addons'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_addons'] = SubscriptionAddon::orderBy('id', 'asc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::orderBy('id', 'asc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_addons'] = SubscriptionAddon::orderBy('id', 'desc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::orderBy('id', 'desc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::orderBy('id', 'desc')->count();

        } else {

            $data['all_addons'] = SubscriptionAddon::orderBy('id', 'desc')->simplePaginate($this->addonPagination);
            $data['total_pages'] = SubscriptionAddon::orderBy('id', 'desc')->paginate($this->addonPagination);
            $data['all_addons_count'] = SubscriptionAddon::orderBy('id', 'desc')->count();

        }


        $request->flash();
        return $data;
    }


    public function createAddon($request)
    {

        $addon = SubscriptionAddon::create([
            "created_by" => Auth::user()->id,
            'charge_type' => $request->charge_type,
            "name" => $request->name,
            'invoice_name' => $request->invoice_name,
            'total_price' => $request->total_price,
            'description' => $request->description,
            'price_model_id' => $request->pricing_model_id,
            'price' => $request->price,
            'addon_type_id' => $request->addon_type_id,
            'period' => $request->period,
            'period_unit' => $request->period_unit
        ]);

        SubscriptionPlanPivotPricingModel::create(['addon_id'=>$addon->id,'pricing_model_id'=>$addon->price_model_id]);

        if ($request->pricing_model_id == 1) {
            $featureCount = 0;
            foreach ($request->feature_name as $feature) {
                $addon->addonFeatures()->create([
                    'site_id' => $feature,
                    'quantity' => $request->feature_quantity[$featureCount],
                    'price' => $request->price[$featureCount]
                ]);
                $featureCount++;
            }

        } else {

            foreach ($request->feature_name as $feature) {
                $siteName = Site::find($feature);
                $featureModel = SubscriptionPlanFeature::create([
                    'subscription_addon_id'=>$addon->id,
                    'site_id' => $feature
                ]);
                    $forUnit = 0;
                    foreach ($request->unit[$siteName->name] as $addUnit) {
                        PricingUnit::create([
                            'subscription_plan_feature_id' => $featureModel->id,
                            'price' => $request->price[$siteName->name][$forUnit],
                            'qty' => $addUnit,
                        ]);
                        $forUnit++;
                    }
            }
        }


        return "success";
    }

}
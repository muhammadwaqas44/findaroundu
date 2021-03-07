<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\SubscriptionPlanPackage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\StripeServices;
use Illuminate\Http\Request;
use App\Subscription\MainModule;

class PackageServices
{
    private $packagePagination = 5;

    public function deletePackage($packageId)
    {
        SubscriptionPlanPackage::destroy($packageId);
        return 'success';
    }

    public function postAddNewPackage($request){
        $planids = $request->plan_id;
        $name = $request->name;
        $moduleId = $request->module_id;
        $productData = MainModule::find($moduleId);
        $productId = $productData->stripe_product_id;

        if ($planids) {
            foreach ($planids as $planid) {
                if ($productId) {
                    // stripe work to add plan
                    $stripeService = new StripeServices();
                    $stripePlan = $stripeService->addPlan($planid,$productId);

                    SubscriptionPlanPackage::create(['name' => $name, 'module_id' => $moduleId, 'plan_id' => $planid, 'stripe_plan_id' => $stripePlan->id]);
                }
            }
        }
    }

    public function addInvoiceNotes($packageId, Request $request)
    {
        SubscriptionPlanPackage::find($packageId)->update($request->except(['_token']));
        return 'success';
    }

    public function addComments($packageId, Request $request)
    {
        SubscriptionPlanPackage::find($packageId)->update($request->except(['_token']));
        return 'success';
    }

    public function deleteComment($packageId)
    {
        SubscriptionPlanPackage::find($packageId)->update(['comment' => NULL]);
        return 'success';
    }




    public function getPackages($request)
    {
        if ($request->sort_by == "oldest" && $request->has('search')) {

            $data['all_packages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_packages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_packages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_packages'] = SubscriptionPlanPackage::orderBy('id', 'asc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::orderBy('id', 'asc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_packages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::orderBy('id', 'desc')->count();

        } else {

            $data['all_packages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::orderBy('id', 'desc')->count();

        }

        $request->flash();
        return $data;
    }

    public function getFrontPackages($request)
    {


            $data['all_packages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->simplePaginate($this->packagePagination);
            $data['total_pages'] = SubscriptionPlanPackage::orderBy('id', 'desc')->paginate($this->packagePagination);
            $data['all_packages_count'] = SubscriptionPlanPackage::orderBy('id', 'desc')->count();


        return $data;
    }

    public function getAllPackagesDataUserAdmin($user,$request)
    {
        $data['all_packages'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['total_packages'] = $user->subscriptions()->orderBy('id', 'desc');
        $data['all_packages_count'] = $user->subscriptions()->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $data['all_packages'] = $data['all_subscriptions']->where('title', 'like', '%' . $request->search . '%');
            $data['total_packages'] = $data['total_adds']->where('title', 'like', '%' . $request->search . '%');
            $data['all_packages_count'] = $data['all_adds_count']->where('title', 'like', '%' . $request->search . '%');
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
}
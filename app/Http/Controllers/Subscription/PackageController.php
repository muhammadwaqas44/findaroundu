<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Services\PackageServices;
use App\Http\Controllers\Controller;
use App\Subscription\MainModule;
use App\Subscription\SubscriptionPlanPackage;
use App\Subscription\SubscriptionPlan;
use App\MainCountry;
class PackageController extends Controller
{

    public function allPackages(Request $request, PackageServices $packageServices)
    {

        $data['all_packages'] = $packageServices->getPackages($request);
        return view('Admin.Packages.all-packages', compact('data'));
    }

    public function frontPackages(Request $request, PackageServices $packageServices)
    {
        $data['front_packages'] = $packageServices->getFrontPackages($request);
        $data['countries'] = MainCountry::all();
//        $data['front_packages']['all_packages']);
        return view('User.Packages.front-packages', compact('data'));


    }

    public function addNewPackage()
    {
        $data['modules'] = MainModule::all();
        $data['plans'] = SubscriptionPlan::all();
        return view('Admin.Packages.add-new-package', compact('data'));
    }

    public function postAddNewPackage(Request $request, PackageServices $packageServices)
    {
        $packageServices->postAddNewPackage($request);

        return redirect()->route('admin.all-packages');

    }

    public function packages()
    {
        $packages = SubcriptionPlanPackage::all();
        return view();
    }

    public function plan_packages()
    {
        $data['packages'] = SubscriptionPlanPackage::all();
        $data['countries'] = MainCountry::all();
        return view('Admin.Packages.packages', compact('data'));
    }


}

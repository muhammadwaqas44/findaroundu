<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Subscription\Site;
use App\Subscription\SubscriptionAddon;
use App\Subscription\SubscriptionPlanFeature;
use App\Subscription\SubscriptionPlanType;
use App\Subscription\SubscriptionPlan;
use App\Subscription\SubscriptionPricingModel;
use App\Subscription\SubscriptionPlanPivotPricingModel;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\Services\PlanServices;


class PlanController extends Controller
{
    public function allPlans(Request $request, PlanServices $planServices)
    {
        $data['all_plans'] = $planServices->getPlans($request);
        return view('admin.Plans.all-plans', compact('data'));
    }

    public function addNewPlan(Request $request)
    {

        $data['pricing_modal'] = SubscriptionPricingModel::Plans()->get();
        $data['planTypes'] = SubscriptionPlanType::all();
        $data['sites'] = Site::all();
        $data['add_ons'] = SubscriptionAddon::all();
        return view('admin.Plans.add-new-plan', compact('data'));
    }


    public function postAddNewPlan(Request $request)
    {
        $featuresQuantity = $request->feature_quantity;
        $featureDuration = $request->feature_duration;

        $plan = SubscriptionPlan::create(array_merge($request->except(['subscription_addon_id','feature_duration','feature_quantity','feature_name','_token', 'pricing_model_id', 'price']), ['user_id' => Auth::user()->id]));


        $priceModel = SubscriptionPricingModel::find($request->pricing_model_id);


        if ($priceModel->name == "Flat Fee") {
            SubscriptionPlanPivotPricingModel::create([
                'pricing_model_id' => $request->pricing_model_id,
                'plan_id' => $plan->id,
                'price' => $request->price,
                'setup_price' =>1,
            ]);
        }

        if ($request->filled('feature_name')) {
            for ($i = 0; $i < sizeof($request->feature_name); $i++) {

                SubscriptionPlanFeature::create(['site_id' =>$request->feature_name[$i],'quantity'=>$featuresQuantity[$i],'subscription_plan_id'=> $plan->id, 'duration'=>$featureDuration[$i] ]);
            }
        }

        $planAddOn = $plan->planAddOn()->attach($request->subscription_addon_id);

        return redirect()->route('admin.all-plans');
    }

    public function deleteInvoiceNote($planId, PlanServices $planServices)
    {
        $planServices->deleteInvoiceNote($planId);
        return redirect()->back();
    }


    public function addComments($planId, Request $request, PlanServices $planServices)
    {
        $planServices->addComments($planId, $request);
        return redirect()->back();
    }

    public function deleteComments($planId, PlanServices $planServices)
    {
        $planServices->deleteComment($planId);
        return redirect()->back();
    }


    public function addInvoiceNotes($planId, Request $request, PlanServices $planServices)
    {
        $planServices->addInvoiceNotes($planId, $request);
        return redirect()->back();
    }


    public function planDelete($planId, PlanServices $planServices)
    {
        $planServices->deletePlan($planId);
        return redirect()->route('admin.all-plans');
    }


    public function planDetail($planId)
    {

        $data['plan'] = SubscriptionPlan::find($planId);
        if(Auth::user()->role_id == 1){
        return view('admin.Plans.plan-detail', compact('data'));
        }else{
        return view('agent.Plans.plan-detail', compact('data'));}
    }


}

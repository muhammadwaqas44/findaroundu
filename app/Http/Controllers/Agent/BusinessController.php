<?php

namespace App\Http\Controllers\Agent;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\Category;
use App\MainCity;
use App\MainCountry;
use Auth;
use App\MainState;
use App\Services\BusinessesService;

class BusinessController extends Controller
{
    public function agentAdminBusinesses(Request $request, BusinessesService $businessesService)
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['settings'] = Setting::all()->where('is_active',1)->first();
        $data['categories'] = Category::add()->get();
        $data['all_business'] = $businessesService->getAllBusinessDataAgentAdmin($request);
        return view('Agent.Business.all-business', compact('data'));
    }

    public function addBusiness()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['users'] = Auth::user()->myUsers()->NotAdmin()->Agent()->get();
        $data['categories'] = Category::add()->get();
        return view('Agent.Business.create-business', compact('data'));
    }

    public function postBusiness(Request $request, BusinessesService $businessesService)
    {
        try{
        $businessesService->postBusiness($request, 'agent');
        return redirect()->route('agent.all-business');}
        catch (\Exception $e){
            $request->flash();
            return redirect()->back();
    }
    }

    public function businessAgentDetail($businessId)
    {
        $data['business'] = Business::withoutGlobalScopes()->find($businessId);

        $data['all_services'] = Auth::user()->services;
        $data['user_services'] = $data['business']->createdBy->services;
          // dd($data['user_services']);
        return view('Agent.Business.business-detail', compact('data'));
    }

    public function deleteBusiness($businessId){
        Business::withoutGlobalScopes()->find($businessId)->delete();
        return redirect()->route('agent.all-business');
    }

    public function addServices($businessId, Request $request, BusinessesService $businessesService)
    {
        $businessesService->addServices($businessId,$request);
        return redirect()->back();
    }

    public
    function approveBusiness($id, BusinessesService $businessesService)
    {
        $businessesService->approveBusiness($id);
        return redirect()->back();
    }


}

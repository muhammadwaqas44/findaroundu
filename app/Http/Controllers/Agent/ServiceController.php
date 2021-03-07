<?php

namespace App\Http\Controllers\Agent;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Auth;
use App\Services\ReviewService;
use App\Services\ServicesService;
use App\MainState;
use App\MainCountry;
use App\MainCity;
use App\Category;
use App\Gallery;

class ServiceController extends Controller
{
    public function addService()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        $data['users'] = Auth::user()->myUsers()->NotAdmin()->Agent()->get();
        return view('Agent.Services.create-services', compact('data'));
    }

    public function postService(Request $request, ServicesService $servicesService)
    {
        try{
        $servicesService->postService($request, 'agent');
        return redirect()->route('agent.all-services');}
        catch(\Exception $e){
            $request->flash();
            return redirect()->back();
        }
    }

    public function agentAdminServices(Request $request, ServicesService $servicesService)
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['settings'] = Setting::all()->where('is_active',1)->first();
        $data['categories'] = Category::add()->get();
        $data['all_services'] = $servicesService->getAllServicesDataAgentAdmin($request);
        return view('Agent.Services.all-services', compact('data'));
    }


    public function serviceDetail($serviceDetail, ReviewService $reviewService)
    {
        $data['service_detail'] = Service::withoutGlobalScopes()->find($serviceDetail);
        $data['flag'] = 'Service';
        $data['reviews'] = Service::withoutGlobalScopes()->find($serviceDetail)->reviews;
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail($serviceDetail, null, null);
        return view('Agent.Services.services-detail', compact('data'));
    }

    public function deleteGalleryImage($service_id)
    {
        Gallery::withoutGlobalScopes()->find($service_id)->delete();
        return redirect()->back();
    }

    public function deleteService($serviceId)
    {
        Service::withoutGlobalScopes()->find($serviceId)->delete();
        return redirect()->route('agent.all-services');
    }

    public
    function approveService($id, ServicesService $servicesService)
    {
        $servicesService->approveServiceStatus($id);
        return redirect()->back();
    }


    public
    function rejectService($id, ServicesService $servicesService)
    {
        $servicesService->rejectService($id);
        return redirect()->back();
    }
}

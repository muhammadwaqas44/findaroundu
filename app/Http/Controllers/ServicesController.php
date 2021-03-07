<?php

namespace App\Http\Controllers;

use App\Service;
use App\Services\ReviewService;
use App\Services\ServicesService;
use App\MainState;
use App\MainCountry;
use App\MainCity;
use App\Category;
use Illuminate\Http\Request;
use App\Gallery;


class ServicesController extends Controller
{
    public function userServices(Request $request, ServicesService $servicesService)
    {
        $data['professionals'] = Category::Individual()->whereNull('parent_id')->get();
        if ($request->filled('category_id')) {
            $data['category_name'] = Category::find($request->category_id)->name;

        }

        return view('User.Services.front-services', compact('data'));
    }

    public function userServicesData (Request $request, ServicesService $servicesService){
        return $servicesService->getAllServicesFront($request);
    }


    public function addService()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        return view('User.Services.create-services', compact('data'));
    }





    public function serviceDetail($serviceDetail, ReviewService $reviewService)
    {
        $data['service_detail'] = Service::withoutGlobalScopes()->find($serviceDetail);
        $data['flag'] = 'Service';
        $data['reviews'] = Service::withoutGlobalScopes()->find($serviceDetail)->reviews;
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail($serviceDetail, null, null,null);
        return view('User.Services.front-service-detail', compact('data'));
    }


    public function serviceDetailUnVerified(Request $request, ReviewService $reviewService, ServicesService $servicesService)
    {
        $data['service_detail'] = $servicesService->unverifiedServiceDetail($request->placeId);
        return view('User.Services.front-service-detail-unverified', compact('data'));
    }




    public function deleteService($serviceId)
    {
         Service::withoutGlobalScopes()->find($serviceId)->delete();
        return redirect()->back();
    }

    public function deleteGalleryImage($service_id)
    {
        Gallery::withoutGlobalScopes()->find($service_id)->delete();
        return redirect()->back();
    }


    public function postService(Request $request, ServicesService $servicesService)
    {
        try{
        $servicesService->postService($request, null);

        return redirect()->route('user.front-services',['posted_by' => "me"]);}
        catch (\Exception $e){
            $request->flash();
            return redirect()->back();
        }

    }


////////    DATA TABLE ROUTES

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


    public
    function getAllServicesData(ServicesService $servicesService)
    {
        return $servicesService->getAllServicesData();
    }

    public
    function changeServiceStatus($id, ServicesService $servicesService)
    {
         $servicesService->changeServiceStatus($id);
         return redirect()->back();
    }

    public
    function approveAllServicesStatus(Request $request, ServicesService $servicesService)
    {
        $servicesService->approveAllServicesStatus();
        $request->session()->flash('status','All Services are approved successfully!');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }



    public function servicesDetails($serviceId)
    {
        $data['service_detail'] = Service::withoutGlobalScopes()->find($serviceId);

        return view('User.Services.services-detail', compact('data'));
    }

////////    END DATA TABLE DATA TABLE


}

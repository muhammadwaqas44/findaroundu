<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\FauJob;
use App\MainCity;
use App\MainCountry;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
use App\Services\ReviewService;
use App\Services\ServicesService;
use Auth;
use App\Gallery;
use App\MainState;
use App\Services\BusinessesService;
use Illuminate\Http\Request;

class BusinessController extends Controller
{

    public function addServices($businessId, Request $request, BusinessesService $businessesService)
    {
        $businessesService->addServices($businessId, $request);
        return redirect()->back();
    }


    public function addJobs($businessId, Request $request, BusinessesService $businessesService)
    {
        $businssJob = $businessesService->addJob($businessId, $request);

        if($businssJob)
        {

            $data['business_detail'] = Business::find($businessId);;

            return response()->json(['result'=>'success','message'=>'Save Successfully','response_html'=>view('home.Partials.ajax_response_show_jobs')->with('data',$data)->render()]);
        }


    }


    public function userBusinessesData(Request $request, BusinessesService $businessesService)
    {
        return $businessesService->getAllBusinessFront($request);
    }

    public function businessDetailUnVerified(Request $request, ReviewService $reviewService, BusinessesService $businessesService)
    {
        $data['service_detail'] = $businessesService->unverifiedBusinessDetail($request->placeId);
        return view('User.Services.front-service-detail-unverified', compact('data'));
    }

    public function userBusinesses(Request $request, BusinessesService $businessesService)
    {
        $data["listing_type"] = ($request->filled('for_redirect')) ? $request->for_redirect : "Business Directory";
        $data["category_id"] = ($request->filled('category_id')) ? $request->category_id : "";
        $data["city_id"] = ($request->filled('city_id')) ? $request->city_id : "";
        $data["search_location"] = ($request->filled('search_location')) ? $request->search_location : "";
        $data["keyword"] = ($request->filled('keyword')) ? $request->keyword : "";

        return view('User.Business.front-business-listing', compact('data'));
    }


    public function addCategories($busienssId, Request $request)
    {
        $data['business_detail'] = Business::withoutGlobalScope(ActiveScope::Class)->withoutGlobalScope(IsApproveScope::Class)->find($busienssId);
        $data['business_detail']->categories()->sync($request->category_ids);
        $data['business_detail']->tags()->sync($request->tags);
        return response()->json(['status' => 'success', 'message' => 'Categories Added.', 'reponse_tags_html' => view('home.Partials.ajax_response_show_tags')->with('data', $data)->render(),'response_html' => view('home.Partials.ajax_response_show_categories')->with('data', $data)->render()]);
    }

    public function postBusiness(Request $request, BusinessesService $businessesService)
    {
        //try
        {
            $businessesService->postBusiness($request, null);
            return redirect()->route('user.all-business', ['posted_by' => 'me']);
        } //catch (\Exception $exception)
        {

            //return redirect()->back();
        }


    }





    public function addBusiness()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::businessType()->get();
        return view('User.Business.create-business', compact('data'));
    }


    public function businessDetail($businessId)
    {
        $data['business'] = Business::withoutGlobalScopes()->find($businessId);

        $data['all_services'] = Auth::user()->services;

        return view('User.Business.business-detail', compact('data'));
    }




    public function viewBusinessDetail($businessId, ReviewService $reviewService)
    {

        $data['business_detail'] = Business::withoutGlobalScopes()->find($businessId);
        $data['flag'] = 'business';
        $data['reviews'] = $data['business_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, null, $businessId, null);
        $data['all_services'] = $data['business_detail']->services;
        $data['user_detail'] = $data['business_detail']->createdBy;
//        $data['job_post'] = $data['business_detail']->jobPost;
        if (Auth::check()) {
            $data['all_services'] = Auth::user()->services;
            $data['jobs'] = Auth::user()->jobs;

        }





        return view('User.Business.front-business-detail', compact('data'));
    }

    public function editDescription(Request $request,BusinessesService $businessesService)
    {

        $desc = $businessesService->updateDescription($request);

        if($desc == 'success')
        {
            return response()->json(['result'=>'success','message'=>'Update Successfully']);
        }


    }


    public function editPhone(Request $request,BusinessesService $businessesService)
    {

        $desc = $businessesService->updatePhone($request);

        if($desc == 'success')
        {
            return response()->json(['result'=>'success','message'=>'Update Successfully']);
        }


    }



    /*public function viewBusiness(Request $request, BusinessesService $businessesService){
        $data['all_business'] = $businessesService->getAllBusinessFront($request);
        $data['latest_business']=Business::all()->sortByDesc('id')->take(5);
        return view('User.Business.front-business-listing', compact('data'));
    }*/


    public function deleteBusiness($businessId)
    {
        Business::withoutGlobalScopes()->find($businessId)->delete();
        return redirect()->back();
    }


    public function rejectBusiness($id, BusinessesService $businessesService)
    {
        $businessesService->rejectBusiness($id);
        return redirect()->back();
    }

    public
    function approveBusiness($id, BusinessesService $businessesService)
    {
        $businessesService->approveBusiness($id);
        return redirect()->back();
    }

    public
    function approveAllBusiness(Request $request, BusinessesService $businessesService)
    {
        $businessesService->approveAllBusiness();
        $request->session()->flash('status', 'All Businesses are approved successfully!');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }


    public
    function changeBusinessStatus($id, BusinessesService $businessesService)
    {
        $businessesService->changeBusinessStatus($id);
        return redirect()->back();
    }

    public function deleteGalleryImage($business_id)
    {
        Gallery::withoutGlobalScopes()->find($business_id)->delete();
        return redirect()->back();
    }


}

<?php

namespace App\Http\Controllers;

use App\Add;
use App\Address;
use App\Category;
use App\CategoryMaker;
use App\MainCity;
use App\Services\AddonServices;
use Auth;
use App\MainCountry;
use App\Gallery;
use App\MainState;
use App\Services\AddsService;
use App\Services\ReviewService;
use Illuminate\Http\Request;


class AddsController extends Controller
{
    public function getCategories()
    {
        $categories = Category::add()->whereNull('parent_id')->get();
        return response()->json(['result' => 'success', 'data' => $categories]);
    }


    public function getSubCategories($id)
    {
        $subCategories = Category::add()->where('parent_id', '=', $id)->get();
        return response()->json(['result' => 'success', 'data' => $subCategories]);
    }

    public function getMaker($id)
    {
        $subCat = Category::find($id);

        if ($subCat) {
            $data['isAdCond'] = $subCat->is_ad_condition_req;
            $data['isAdType'] = $subCat->is_ad_type_or_make_req;
            $data['additionalField'] = $subCat->is_ad_additional_fields_req;

            if ($data['isAdType']) {
                $data['maker'] = CategoryMaker::where('category_id', '=', $subCat->id)->get();
                return response()->json(['result' => 'success', 'data' => $data]);
            } else {
                return response()->json(['result' => 'success', 'data' => $data]);
            }
        }

    }

    public function getCountries()
    {
        $country = MainCountry::all();

        return response()->json(['result' => 'success', 'country' => $country]);


    }


    public function saveAds(Request $request, AddsService $addsService)
    {
        $saveAds = $addsService->saveAds($request);
        if ($saveAds == 'true') {
            return response()->json(['result' => 'success', 'message' => 'inserted successfully.']);
        }

    }


    public function editDescription(Request $request,AddsService $addsService)
    {

        $desc = $addsService->updateDescription($request);

        if($desc == 'success')
        {
            return response()->json(['result'=>'success','message'=>'Update Successfully']);
        }


    }


    public function editPrice(Request $request,AddsService $addsService)
    {

        $desc = $addsService->updatePrice($request);

        if($desc == 'success')
        {
            return response()->json(['result'=>'success','message'=>'Update Successfully']);
        }


    }


    public function userAdds(Request $request, AddsService $addsService){

        $data['all_adds'] = $addsService->getAllAddsDataUser($request);
        return view('User.Adds.all-adds', compact('data'));
    }


    public function adminAdds(Request $request, AddsService $addsService)
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        $data['all_adds'] = $addsService->getAllAddsDataAdmin($request);
        return view('User.Adds.all-adds', compact('data'));
    }


    public function addsData(Request $request, AddsService $addsService)
    {
        return $addsService->getAllAddsFront($request);
    }


    public function newAdd(Request $request, AddsService $addsService)
    {

        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();

        // dd($data);
        return view('User.Adds.new-adds', compact('data'));
    }

    public function postAdd(Request $request, AddsService $addsService)
    {
        try {
            $addsService->postAdd($request);
            return redirect()->route('user.front-adds');
        } catch (\Exception $e) {
            $request->flash();
            return redirect()->back();
        }
    }

    public function deleteAdds($addId)
    {
        Add::withoutGlobalScopes()->find($addId)->delete();
        return redirect()->back();
    }

    ////////    DATA TABLE ROUTES

    public function getAllAddsData(AddsService $addsService)
    {
        return $addsService->getAllAddsData();
    }

    public function changeAddStatus($id, AddsService $addsService)
    {
        $addsService->changeAddStatus($id);
        return redirect()->back();
    }

    public
    function approveAddStatus($id, AddsService $addsService)
    {
        $addsService->approveAddStatus($id);
        return redirect()->back();
    }

    public
    function rejectAdd($id, AddsService $addsService)
    {
        $addsService->rejectAdd($id);
        return redirect()->back();
    }

    public
    function approveAllAdds(Request $request, AddsService $addsService)
    {
        $addsService->approveAllAdds();
        $request->session()->flash('status', 'All Adds are successfully Approved!');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }

    ////////    END DATA TABLE DATA TABLE


    public function viewAdds(Request $request, AddsService $addsService)
    {
        if ($request->category_id == 'Professionals') {
            if ($request->filled('location')) {
                return redirect()->route('user.front-services');
            } else {
                return redirect()->route('user.front-services', ['location' => $request->location]);
            }
        } else if ($request->category_id == 'Adds') {
            if ($request->filled('location')) {
                return redirect()->route('user.front-adds');
            } else {
                return redirect()->route('user.front-adds', ['location' => $request->location]);
            }
        }

        if ($request->posted_by_me == "me") {
            $data['all_adds'] = $addsService->getAllAddsFront($request);
        } else {
            $data['all_adds'] = $addsService->getAllAddsFront($request);
            $data['latest_adds'] = Add::all()->sortByDesc('id')->take(5);
        }

        $data['professionals'] = Category::Individual()->whereNull('parent_id')->get();
        /* $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);
         $data['flag'] = 'Add';
         $data['reviews'] = $data['add_detail']->reviews();
         $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null);*/
        return view('User.Adds.front-adds-listing', compact('data'));
    }


    public function viewAddDetail($addId, ReviewService $reviewService)
    {

        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);
        $data['flag'] = 'Add';
        $data['reviews'] = $data['add_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null, null);
        $data['user_detail'] = $data['add_detail']->createdBy;

        return view('User.Adds.front-add-detail', compact('data'));
    }

    public function addsDetail($addId)
    {
        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);

        return view('User.Adds.adds-detail', compact('data'));
    }

    public function deleteGalleryImage($add_id)
    {
        Gallery::withoutGlobalScopes()->find($add_id)->delete();
        return redirect()->back();
    }

    public function gallery(Request $request, AddsService $addsService)
    {
        $adds = $addsService->gallery($request);

        if ($adds) {
            $data['gallery'] = Gallery::where('add_id', '=', $request->add_id)->get();
            $data['profile_picture'] = Add::where('id', '=', $request->add_id)->first()->profile_image;

            return response()->json(['result' => 'success', 'data' => $data]);
        }
    }
}

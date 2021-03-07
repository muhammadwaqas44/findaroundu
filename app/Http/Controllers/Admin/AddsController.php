<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\Services\AddsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddsController extends Controller
{
    public function userAdds(Request $request, AddsService $addsService){
        $data['all_adds'] = $addsService->getAllAddsDataUser($request);
        return view('Admin.Adds.all-adds',compact('data'));
    }



    public function adminAdds(Request $request, AddsService $addsService){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        $data['all_adds'] = $addsService->getAllAddsDataAdmin($request);
        $data['users'] = Auth::user()->myUsers()->NotAdmin()->Agent()->get();
        //dd($data);
        return view('Admin.Adds.all-adds',compact('data'));
    }


    public function newAdd(Request $request, AddsService $addsService){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['users'] = Auth::user()->NotAdmin()->Agent()->get();
        $data['categories'] = Category::add()->get();
        return view('Admin.Adds.new-adds', compact('data'));
    }

    public function postAdd(Request $request, AddsService $addsService){

        $addsService->postAdd($request,'admin');
        return redirect()->route('admin.adds');
    }

    public function deleteAdds($addId)
    {
        Add::withoutGlobalScopes()->find($addId)->delete();
        return redirect()->back();
    }

    ////////    DATA TABLE ROUTES

    public function getAllAddsData(AddsService $addsService){
        return $addsService->getAllAddsData();
    }

    public function changeAddStatus($id, AddsService $addsService){
        $addsService->changeAddStatus($id);
        return redirect()->back();
    }

    public function approveAddStatus($id, AddsService $addsService)
    {
        $addsService->approveAddStatus($id);
        return redirect()->back();
    }

    public function rejectAdd ($id, AddsService $addsService)
    {
        $addsService->rejectAdd($id);
        return redirect()->back();
    }

    public function approveAllAdds(Request $request, AddsService $addsService)
    {
        $addsService->approveAllAdds();
        $request->session()->flash('status', 'All Adds are successfully Approved!');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }
    ////////    END DATA TABLE DATA TABLE


    public function viewAdds (Request $request, AddsService $addsService)
    {
        if($request->posted_by == "me") {
            $data['all_adds'] = $addsService->getAllAddsDataUser($request);
        }else{
            $data['all_adds'] = $addsService->getAllAddsFront($request);
            $data['latest_adds']= Add::all()->sortByDesc('id')->take(5);
        }
        /* $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);
         $data['flag'] = 'Add';
         $data['reviews'] = $data['add_detail']->reviews();
         $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null);*/

        return view('Admin.Adds.front-adds-listing',compact('data'));
    }



    public function viewAddDetail($addId, ReviewService $reviewService){
        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);

        $data['flag'] = 'Add';
        $data['reviews'] = $data['add_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null);

        return view('Admin.Adds.front-add-detail', compact('data'));
    }

    public function addsDetail($addId)
    {
        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);

        return view('Admin.Adds.adds-detail', compact('data'));
    }

    public function deleteGalleryImage($add_id)
    {
        Gallery::withoutGlobalScopes()->find($add_id)->delete();
        return redirect()->back();
    }
}

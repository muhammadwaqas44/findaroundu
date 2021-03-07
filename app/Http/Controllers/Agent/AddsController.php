<?php

namespace App\Http\Controllers\Agent;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Add;
use App\Address;
use App\Category;
use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\Services\AddsService;
use App\Services\ReviewService;
use App\User;
use Auth;
use App\Gallery;

class AddsController extends Controller
{
    public function newAdd(Request $request, AddsService $addsService){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        $data['users'] = Auth::user()->myUsers()->NotAdmin()->Agent()->get();
        return view('Agent.Adds.new-adds',compact('data'));
    }

    public function postAdd(Request $request, AddsService $addsService){
       try{ $addsService->postAdd($request, 'agent');
        return redirect()->route('agent.all-adds');}
        catch(\Exception $e){
            $request->flash();
           return redirect()->back();
        }
    }

    public function agentAdminAdds(Request $request, AddsService $addsService){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['settings'] = Setting::all()->where('is_active',1)->first();
        $data['categories'] = Category::add()->get();
        $data['all_adds'] = $addsService->getAllAddsDataAgentAdmin($request);
        return view('Agent.Adds.all-adds',compact('data'));
    }

    public function deleteGalleryImage($add_id)
    {
        Gallery::withoutGlobalScopes()->find($add_id)->delete();
        return redirect()->back();
    }

    public function viewAddDetail($addId, ReviewService $reviewService){
        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);

        $data['flag'] = 'Add';
        $data['reviews'] = $data['add_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllReviewsDetail(null, $addId, null);

        return view('Agent.Adds.front-add-detail', compact('data'));
    }

    public function addsDetail($addId)
    {
        $data['add_detail'] = Add::withoutGlobalScopes()->find($addId);

        return view('Agent.Adds.adds-detail', compact('data'));
    }

    public function deleteAdds($addId)
    {
        Add::withoutGlobalScopes()->find($addId)->delete();
        return redirect()->route('agent.all-adds');
    }

    public function approveAddStatus($id, AddsService $addsService)
    {
        $addsService->approveAddStatus($id);
        return redirect()->back();
    }

}

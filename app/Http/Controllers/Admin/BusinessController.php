<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BusinessesService;
use App\Http\Controllers\Controller;
use App\Business;
use App\Category;
use App\MainCity;
use App\MainCountry;
use Auth;
use App\MainState;

class BusinessController extends Controller
{
    public function postBusiness(Request $request, BusinessesService $businessesService)
    {
        $businessesService->postBusiness($request, 'admin');
        return redirect()->route('admin.all-business');
    }
    public function adminBusinesses(Request $request,  BusinessesService $businessesService)
    {
        $data['all_business'] = $businessesService->getAllBusinessDataAdmin($request);
        return view('Admin.Business.all-business', compact('data'));
    }


    public function businessAdminDetail($businessId)
    {
        $data['business'] = Business::withoutGlobalScopes()->find($businessId);


        return view('Admin.Business.business-detail', compact('data'));
    }

    public function addBusiness()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['users'] = Auth::user()->NotAdmin()->Agent()->get();
        $data['categories'] = Category::add()->get();
        return view('Admin.Business.create-business', compact('data'));
    }

}

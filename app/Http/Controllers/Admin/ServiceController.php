<?php

namespace App\Http\Controllers\Admin;

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

        $data['users'] = Auth::user()->NotAdmin()->Agent()->get();
        return view('Admin.Services.create-services', compact('data'));

    }

    public function postServiceAdmin(Request $request, ServicesService $servicesService)
    {
        $servicesService->postService($request, 'admin');
        return redirect()->route('Admin.services');
    }
    public function adminServices(Request $request, ServicesService $servicesService)
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::add()->get();
        $data['all_services'] = $servicesService->getAllServicesDataAdmin($request);

        return view('Admin.Services.all-services', compact('data'));
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

}

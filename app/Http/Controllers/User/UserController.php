<?php

namespace App\Http\Controllers\User;

use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\Services\AddressService;
use App\Services\CategoryService;
use App\Services\LocationServices;
use App\User;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UsersService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userProfile($userId){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();

        return view('User.Profile.profile',compact('data'));
    }



    public function createSession(Request $request,LocationServices $locationServices, CategoryService $categoryService, AddressService $addressService)
    {
        $session  = $locationServices->setSession($request,$categoryService,$addressService);

        return response()->json(['result'=>'success','message'=>'Session set successfully.','data'=>$session]);

    }

    public function addAddress(Request $request, UsersService $addres){
        $addres->addAddress($request);
        return redirect()->back();
    }

    public function editUser(Request $request, UsersService $editUser){
        $editUser->editUser($request, Auth::user());
        return redirect()->route('user.profile',[Auth::user()->id]);
    }

}

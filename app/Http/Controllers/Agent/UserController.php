<?php

namespace App\Http\Controllers\Agent;

use App\Services\AddsService;
use App\Services\BusinessesService;
use App\Services\PackageServices;
use App\Services\ServicesService;
use App\Services\SubscriptionServices;
use App\Setting;
use Illuminate\Http\Request;
use Auth;
use App\Services\UsersService;
use App\User;
use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function agentUsers(Request $request, UsersService $usersService)
    {
        $data['settings'] = Setting::all()->where('is_active',1)->first();
        $data['all_users'] = $usersService->getAllAgentData($request);
        return view('Agent.User.all-users',compact('data'));
    }

    public function editCustomer($userId, Request $request, UsersService $editUser){
        $editUser->editUser($request, User::withoutGlobalScopes()->find($userId));
        return redirect()->back();
    }



    public function changeCustomerPassword($userId, Request $request, UsersService $usersService){
        try
        {
            $usersService->changeCustomerPassword($userId , $request);
            $request->session()->flash('success','Successfully changed.');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            $request->session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }


    }


    public function userDetail(Request $request,$userId,BusinessesService $businessesService, ServicesService $servicesService, AddsService $addsService,SubscriptionServices $subscriptionServices, PackageServices $packageServices)

    {
        $data['user_detail'] = User::withoutGlobalScopes()-> find($userId);

        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['all_business'] = $businessesService->getAllBusinessDataUserAdmin($data['user_detail'],$request);
        $data['all_services'] = $servicesService->getAllServicesDataUserAdmin($data['user_detail'],$request);
        $data['all_adds'] = $addsService->getAllAddsDataUserAdmin($data['user_detail'],$request);

        $data['all_subscriptions'] = $subscriptionServices->getAllSubscriptionsDataUserAdmin($data['user_detail'],$request);
        $data['front_packages'] = $packageServices->getFrontPackages($request);

        return view('Agent.Customer.user-detail',compact('data'));
    }

    public function deleteUser($customerId, Request $request)
    {

        User::withoutGlobalScopes()->find($customerId)->delete();
        if($request->delete_flag == 'delete')
        {
          return redirect()->route('agent.all-users');
        }
        return redirect()->back();
    }

    public function createUser(){
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        return view('Agent.User.new-user',compact('data'));
    }

    public function changeUserStatus($id, UsersService $usersService)
    {
        $usersService->changeUserStatus($id);
        return redirect()->back();
    }


    public function postAddUser(Request $request, UsersService $usersService)
    {
        try {
            $usersService->addUserByAgent($request);
            return redirect()->route('agent.all-users');

        } catch (\Exception $exception) {
            echo $exception->getMessage();
            //  return redirect()->back();
        }

        //  return redirect()->back();
    }

    public function user_image(Request $request,UsersService $usersService )
    {

        $upload = $usersService->imageUpload($request);

        if($upload == 'success')
        {
            return response()->json(['result'=>'success','message'=>'Image upload']);
        }



    }

}

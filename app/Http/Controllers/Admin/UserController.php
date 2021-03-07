<?php

namespace App\Http\Controllers\Admin;

use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\Role;
use App\Services\PackageServices;
use App\Services\SubscriptionServices;
use Auth;
use App\Scopes\ActiveScope;
use App\Services\AddsService;
use App\Services\BusinessesService;
use App\Services\ServicesService;
use App\Services\UsersService;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Mockery\Exception;

class UserController extends Controller
{


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

    public function editUser($userId, Request $request, UsersService $editUser){
        $editUser->editUser($request, User::withoutGlobalScopes()->find($userId));
        return redirect()->back();
    }

    //////////      FOR DATA TABLES


    public function getAllUsersData(UsersService $usersService)
    {
        return $usersService->getUsersData();
    }

    public function changeUserStatus($id, UsersService $usersService)
    {
         $usersService->changeUserStatus($id);
        return redirect()->back();
    }

    //////////      END DATA TABLES


    public function adminAdds(Request $request, UsersService $usersService)
    {
        $data['all_users'] = $usersService->getAllUsersDataAdmin($request);
        return view('Admin.User.all-users', compact('data'));
    }


    public function allUsers(Request $request,UsersService $usersService)
    {
        $data['all_users'] = $usersService->getAllUsersDataAdmin($request);
        return view('Admin.User.all-users', compact('data'));
    }


    public function addUser()
    {
        $data['roles'] = Role::all();
        $data['cities'] = MainCity::all();
        $data['countries'] = MainCountry::all();

        return view('Admin.User.new-user',compact('data'));
    }

    public function deleteUser($customerId)
    {
        User::withoutGlobalScopes()->find($customerId)->delete();
        return redirect()->back();
    }


    public function userLayout()
    {
        return view('Admin.Customer.customers');
    }

    public function userDetail(Request $request, $userId ,BusinessesService $businessesService, ServicesService $servicesService, AddsService $addsService, SubscriptionServices $subscriptionServices, PackageServices $packageServices)
    {
        $data['user_detail'] = User::with(['createdBy'])->withoutGlobalScope(ActiveScope::class)->find($userId);
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();

        $data['all_business'] = $businessesService->getAllBusinessDataUserAdmin($data['user_detail'],$request);
        $data['all_services'] = $servicesService->getAllServicesDataUserAdmin($data['user_detail'],$request);
        $data['all_adds'] = $addsService->getAllAddsDataUserAdmin($data['user_detail'],$request);
        $data['all_subscriptions'] = $subscriptionServices->getAllSubscriptionsDataUserAdmin($data['user_detail'],$request);
        $data['front_packages'] = $packageServices->getFrontPackages($request);

        return view('Admin.Customer.user-detail',compact('data'));
    }

    public function postAddUser(Request $request, UsersService $usersService)
    {
        try {
            $usersService->addUserByAdmin($request);
            return redirect()->route('admin.all-users');

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
<?php

namespace App\Http\Controllers;

use App\Address;
use App\MainState;
use App\MainCity;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //

    public function getUserAddress(Request $request)
    {
        $address = Address::where('user_id','=',$request->user_id)->first();

        return response()->json(['result'=>'success','data'=>$address]);
    }


    public function getCities($countryId, Request $request)
    {
        $states = MainState::where('country_id', $countryId)->pluck('id');
        $cities = MainCity::whereIn('state_id', $states)->select('id', 'name')->get();


        return response()->json(['result'=>'success','data'=>$cities]);
    }

}

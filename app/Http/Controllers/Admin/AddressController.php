<?php

namespace App\Http\Controllers\Admin;

use App\MainCountry;
use App\Services\AddressService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function countryWiseCities($countryId, AddressService $service){
        $data["countries"] = MainCountry::all();
        $data["country_cities"] = $service->getCitiesCountryWise($countryId);
        $data["count_city_ids"] = $data["country_cities"]->pluck("city_id")->toArray();
        $data["all_cities"] = $service->getCitiesOfCountry($countryId);
        return view('Admin.Addresses.country-wise-cities', compact('data', 'countryId'));
    }

    public function updateCityData(Request $request, AddressService $service){
        $service->updateCity($request);
        return response()->json(["result" => "success", "message" => "City update successfully"], 200);
    }

    public function updateCountrySelectedCity(Request $request, AddressService $service){
        $service->updateSelectedCities($request);
        return response()->json(["result" => "success", "message" => "Selected cities updated."], 200);
    }
}

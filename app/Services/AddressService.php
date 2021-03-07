<?php


namespace App\Services;

use App\Helpers\ImageHelpers;
use App\MainCity;
use App\MainCountry;
use App\MainState;
use App\PivotCountryCity;

class AddressService
{
    public  function getCitiesOfCountry($countryId){
        $states = MainState::where('country_id', $countryId)->pluck('id');
        $cities = MainCity::whereIn('state_id', $states)->get();
        return $cities;
    }

    public  function getCitiesCountryWise($countryId){
        $cities = PivotCountryCity::with(["cities"=>function($cities){
            $cities->withCount(["adds","services","business"]);
        }])->where(["country_id" => $countryId]);
        return $cities->orderBy("order_no", "ASC")->get();
    }

    public function updateCity($request){
        $city = MainCity::find($request->id);
        if(!empty($request->image)) {
            $fileName = time() . "-" . rand(10, 1000000) . $request->name . ".png";
            ImageHelpers::updateProfileImage('project-assets/images/cities/', $request->file('image'), $fileName);
            $city->update(array_merge($request->except('_token'), ['image' => "project-assets/images/cities/" . $fileName]));
        } else{
            $city->update($request->except(['_token']));
        }
    }

    public function updateSelectedCities($request){
        $country = MainCountry::find($request->country_id);
        if($country && isset($request->id) && is_array($request->id)){
            $newArr = [];
            foreach($request->id as $key => $val){
                $newArr[$val] = [
                    "order_no" => $key,
                ];
            }
            $country->selectedCities()->sync($newArr);
        }
    }
}

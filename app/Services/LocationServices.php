<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2019
 * Time: 2:31 PM
 */

namespace App\Services;


use App\MainCity;
use App\MainCountry;
use Illuminate\Support\Facades\Session;

class LocationServices
{
    public function setSession($request,  $categoryService, $addressService)
    {
//        if(!Session::has('location')) {

            $country = MainCountry::where('name', '=', $request->country)->first();

            if ($country) {
                $countryId = $country->id;

                $city_record = $addressService->getCitiesCountryWise($countryId);

                if (sizeof($city_record) > 0) {
                    $cityId = $city_record->pluck('city_id')->first();
                    $cityName = $city_record->first()->cities->name;
                } else {
                    $cityCountry = $addressService->getCitiesOfCountry($countryId);
                    $cityId = $cityCountry->pluck('id')->first();
                    $cityName = $cityCountry->pluck('name')->first();
                }

                $data['countryId'] = $countryId;
                $data['cityId'] = $cityId;
                $data['city'] = $cityName;
                $data['country'] = $country->name;
                $data['countryFlag'] = $country->flag;
                $data['countryCode'] = $country->country_code;

                Session::put('location', $data);

                $data['services'] = self::getProfessionalRecord($categoryService,$countryId);
                $data['cities'] = self::getCityRecord($addressService,$countryId);
                $data['allCountries'] = MainCountry::all();
                $data['allCities'] =  $addressService->getCitiesOfCountry($countryId);



            }
            else{
                $countryId = 166; //Pakistan default id

                $city_record = AddressService::getCitiesCountryWise($countryId);

                if (sizeof($city_record) > 0) {
                    $cityId = $city_record->pluck('city_id')->first(); //Lahore default id
                    $cityName = $city_record->first()->cities->name;
                } else {
                    $city_record = AddressService::getCitiesOfCountry($countryId);
                    $cityId = $city_record->pluck('id')->first();
                    $cityName = $city_record->pluck('name')->first();
                }

                $data['countryId'] = $countryId;
                $data['cityId'] = $cityId;
                $data['city'] = $cityName;
                $data['country'] = 'Pakistan';
                $data['countryFlag'] = '/main-assets/images/pakistan-flag.png';
                $data['countryCode'] = 'pak';
                Session::put('location', $data);
            }

            return $data;
        }

        public static function getProfessionalRecord($categoryService,$countryId)
        {

            $professional_categories = $categoryService->getCategoryCountryWise($countryId,'Professionals');

            $services = [];
            foreach($professional_categories as $key=>$service)
            {
                $services[] = array('image'=> $service->category->profile_image, 'route'=>route('user.front-services',['category_id' => $service->category->id]) ,
                    'name'=>ucfirst($service->category->name),'count'=>$service->category->service->count() + $service->category->fauJob->count());
            }
            $data['services'] = $services;

            return $data['services'];
        }

        public static function getCityRecord($addressService,$countryId)
        {
            $countryCity = $addressService->getCitiesCountryWise($countryId);

            $citiesRec = [];
            foreach ($countryCity as $key=>$cityData)
            {

                $citiesRec[] = array(
                    'image'=>!empty($cityData->cities->image) ? $cityData->cities->image:'' ,
                    'name'=>$cityData->cities->name,'adds_count'=>$cityData->cities->adds_count,
                    'services_count'=>$cityData->cities->services_count,'business_count'=>$cityData->cities->business_count,
                    'add_route'=>route('user.front-adds',['city_id' => $cityData->id]),
                    'business_route'=>route('user.front-business',['city_id' => $cityData->id]),
                    'service_route'=>route('user.front-services',['city_id' => $cityData->id])
                );
            }

            $data['cities'] = $citiesRec ;

            return $data['cities'];

        }



}
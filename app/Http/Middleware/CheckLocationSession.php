<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/12/2019
 * Time: 2:47 PM
 */

namespace App\Http\Middleware;

use App\Add;
use App\MainCity;
use App\PivotCountryCity;
use App\Services\AddressService;
use Carbon\Carbon;
use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class CheckLocationSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//Session::forget('location');
        if(!Session::has('location')){

            $countryId = 166; //Pakistan default id

            $city_record = AddressService::getCitiesCountryWise($countryId);

            if(sizeof($city_record) > 0)
            {
                $cityId = $city_record->pluck('city_id')->first(); //Lahore default id
                $cityName = $city_record->first()->cities->name;
            }
            else{
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
//        dd(Session::get('location')['countryFlag']);

        return $next($request);
    }
}
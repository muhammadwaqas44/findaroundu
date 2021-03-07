<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/18/2019
 * Time: 2:56 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Session;

class TimezoneHelper
{

    public static function  SetTimeZone($timezone)
    {
        $time_zone_name = timezone_name_from_abbr("", $timezone*60, false);
        Session::put('time_zone',$time_zone_name);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Helpers;


use Illuminate\Http\Request;
use Image;

class MapHelper
{

    ///////     Type can be link or anything else. In $file we will receive path of file or object of file
    public static function mapHelper($list, $flag = 'service')
    {

        echo " <script>


 function check(value, miniDiv) {
            document.getElementById(miniDiv).style.maxHeight = \"auto\";
            document.getElementById(value).style.display = 'block';
            document.getElementById(value).style.display = 'block';
            document.getElementById(miniDiv).removeAttribute(\"data-target\");
        }


        function mousehover(value, flag) {

            if (flag == \"in\") {
                document.getElementById('content_' + value).style.border = \"2px solid rgb(251, 57, 125)\";
            } else if (flag == \"out\") {
                document.getElementById('content_' + value).style.border = \"0px solid red\";
            }
        }
    </script>";

        foreach ($list as $item) {
            if ($item->reviews()->avg('rating') == 0) {
                $stars = '<span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                class="fa fa-star"></span><span class="fa fa-star"></span><span
                                class="fa fa-star"></span>';
            } elseif ($item->reviews()->avg('rating') >= 1 && $item->reviews()->avg('rating') < 2) {
                $stars = '<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span
                                class="fa fa-star"></span><span class="fa fa-star"></span><span
                                class="fa fa-star"></span>';
            } elseif ($item->reviews()->avg('rating') >= 2 && $item->reviews()->avg('rating') < 3) {
                $stars = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                        ';
            } elseif ($item->reviews()->avg('rating') >= 3 && $item->reviews()->avg('rating') < 4) {
                $stars = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><span class="fa fa-star"></span><span
                                class="fa fa-star"></span>';
            } elseif ($item->reviews()->avg('rating') >= 4 && $item->reviews()->avg('rating') < 5) {
                $stars = '<span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span
                                class="fa fa-star"></span>';
            } elseif ($item->reviews()->avg('rating') == 5) {
                $stars = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span
                                class="fa fa-star checked"></span>';
            }


            $serviceLink = route('user.front-services.detail', [$item->id]);
            $popUpId = "popup_$item->id";


            $infoPopId = 'popup_' . $item->id;
            $miniDiv = 'content_' . $item->id;
            echo "<div id ='$miniDiv' style = 'max-height: max-content;z-index:10000'
                       onclick = \"check('$infoPopId','$miniDiv')\" >";


            if($flag == 'service'){
                if (!empty($item->hourly_price)) {
                    echo "<div > Houry price $item->hourly_price</div >";
                }
                if (!empty($item->project_price)) {
                    echo "<div > Project price $item->project_price  </div >";
                }
            }

            if($flag == 'business'){
                foreach($item->rates as $rate){
                    if ( $rate->price_type == "Hourly Base")
                    {
                        echo "<div > Houry price ".$rate->rate."</div >";
                    }
                    if ( $rate->price_type == "Project Base")
                    {
                        echo "<div > Project price $rate->rate  </div >";
                    }
                }

            }

            if($flag == 'jobs')
            {
                echo "<div > $item->budget </div >";
            }

            if($flag == 'adds'){
                echo "<div > Add Price: $item->price  </div >";

            }


            echo "<div id = '$popUpId' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '$item->profile_image' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '$serviceLink' >$item->title</a ></b >
                            </div >
                             $stars 
                            </div >
                    </div >";
        }
    }

    public static function cityLatLong($locationName, $city = null){

        $googleApiAddress = "https://maps.googleapis.com/maps/api/geocode/json?key=" . env('GOOGLE_KEY') . "&address=" . $locationName;
        $client = new \GuzzleHttp\Client();$response = $client->request('GET', $googleApiAddress);
        $response = json_decode($response->getBody());

        if ($response->status == 'OK') {
            return $response->results[0]->geometry->location;
        }
    }


}
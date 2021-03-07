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

class ReviewHelper
{

    ///////     Type can be link or anything else. In $file we will receive path of file or object of file
    public static function reviewStars($object,$flag = 'verified')
    {

        if($flag == 'verified') {
            if ($object->reviews()->avg('rating') == 0) {
                return " <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object->reviews()->avg('rating') >= 1 && $object->reviews()->avg('rating') < 2) {
                return "<span class='fa fa-star checked></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object->reviews()->avg('rating') >= 2 && $object->reviews()->avg('rating') < 3) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object->reviews()->avg('rating') >= 3 && $object->reviews()->avg('rating') < 4) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object->reviews()->avg('rating') >= 4 && $object->reviews()->avg('rating') < 5) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object->reviews()->avg('rating') == 5) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>";
            }
        }else{
            if ($object == 0) {
                return " <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object >= 1 && $object < 2) {
                return "<span class='fa fa-star checked></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object >= 2 && $object < 3) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object >= 3 && $object < 4) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object >= 4 && $object < 5) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>";
            } elseif ($object == 5) {
                return "<span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>";
            }
        }

    }


}
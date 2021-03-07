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

class ImageHelpers
{

    ///////     Type can be link or anything else. In $file we will receive path of file or object of file
    public static function updateProfileImage($folderName = "project-assets/images/", $file, $fileName){
        Image::make($file)->save(public_path($folderName . $fileName));
    }

    public static function uploadFile($folderName = '/project-assets/files' , $file , $fileName){
        $filename = $fileName;
        $destinationPath = public_path($folderName);
        $file->move($destinationPath,$filename);

    }

    public static function uploadVideo($folderName = '/project-assets/files' , $file , $fileName){
        $filename = $fileName;
        $destinationPath = public_path($folderName);
        $file->move($destinationPath,$filename);

    }


    public static function fullName($firstName,$lastName)
    {
        $fullName = $firstName . $lastName;

        if (strlen($fullName) > 11) {
            return substr($fullName, 0, 12)."..";
        }else{
            return $fullName;
        }
    }

    public static function trim_word($text, $length, $startPoint=0, $allowedTags=""){
        $text = html_entity_decode(htmlspecialchars_decode($text));
        $text = strip_tags($text, $allowedTags);
        if(strlen($text) > $length){
            return $text = substr($text, $startPoint, $length)."...";
        } else {
            return $text = substr($text, $startPoint, $length);
        }
    }



}
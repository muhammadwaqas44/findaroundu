<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
       'user_id','first_name','last_name','age','user_id','profile_image','account_type'
    ];

    public function getProfileImageAttribute($profile_image)
    {
        if ($profile_image != null) {
            return asset($profile_image);
        } else {
            return asset('main-admin/images/default.png');
        }
    }
}

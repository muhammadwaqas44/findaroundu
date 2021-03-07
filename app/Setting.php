<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = ['title','is_user','is_business','is_service','is_adds','is_active'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['add_id','business_id','service_id','name'];

    public function getNameAttribute($name)
    {
        return asset($name);
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $fillable = ['day','_to','_from','business_id','service_id'];
}

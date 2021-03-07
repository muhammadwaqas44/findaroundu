<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotCountryCity extends Model
{
    protected $table = "pivot_country_city";

    public function cities(){
        return $this->belongsTo("App\MainCity", "city_id");
    }
}

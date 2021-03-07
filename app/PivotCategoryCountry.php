<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotCategoryCountry extends Model
{
    protected $table = "pivot_category_country";

    public function scopeProfessional($query)
    {
        return $query->where('type', 'Professionals');

    }




    public function category(){
        return $this->belongsTo("App\Category");
    }
}

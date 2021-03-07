<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FauJob extends Model
{
    //
    protected $guarded = [];


    public function fauTags()
    {
        return $this->belongsToMany('App\FauTag', 'pivot_faujobs_business_service_add_tags', 'fau_job_id', 'fau_tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'pivot_categories_adds_business_services', 'job_id', 'category_id');
    }

    public function scopeActiveUserJobs($query)
    {
        return $query->whereHas('created_by',function($query){$query->where('is_active',1);});
    }

    public function created_by()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function city()
    {
        return $this->belongsTo('App\MainCity','city_id');
    }


    public function reviews(){
        return $this->hasMany('App\Review');
    }

}

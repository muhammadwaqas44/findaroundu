<?php

namespace App;

use Carbon\Carbon;
use App\FauTag;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;

class Business extends Model
{
    protected $fillable = ['employee_count_id', 'founded_in', 'website_url', 'location', 'long', 'lat', 'phone', 'email', 'facebook_url', 'gmail_url', 'twitter_url', 'video_url', 'title', 'description', 'is_active', 'is_approve', 'created_by', 'profile_image', 'agent_admin_id'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
        static::addGlobalScope(new IsApproveScope());
    }

    public function scopeActiveUserBusinesses($query)
    {
        return $query->whereHas('createdBy', function ($query) {
            $query->where('is_active', 1);
        });
    }

    public function getCreatedByStatusAttribute()
    {
        if (Auth::check()) {
            if ($this->attributes['created_by'] == Auth::user()->id) {
                return "Posted By Me";
            }
        } else {
            return "Not Posted By Me";
        }
    }

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    public function portfolios()
    {
        return $this->hasMany(BusinessPortFolio::Class,'business_id');
    }


    public function searchRates()
    {
        return $this->hasOne('App\Rate');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'pivot_categories_adds_business_services', 'business_id', 'category_id');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'business_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }


    public function getProfileImageAttribute($profile_image)
    {
        return asset($profile_image);
    }

    public function timings()
    {
        return $this->hasMany(Timing::class, 'business_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'business_id');
    }

    public function tags()
    {
        return $this->belongsToMany(FauTag::Class, 'pivot_faujobs_business_service_add_tags', 'business_id', 'fau_tag_id');
    }


    public function jobs()
    {
        return $this->hasMany('App\FauJob', 'business_id');
    }


    public function services()
    {
        return $this->belongsToMany(Service::class, 'pivot_business_services', 'business_id', 'service_id')->withoutGlobalScope(ActiveScope::class);
    }

    public function getTimingStatusAttribute()
    {
        if ($this->timings()->where([['day', '=', Carbon::today()->format('l')]])->where('_from', '<=', Carbon::now()->format('H:i:s'))->where('_to', '>=', Carbon::now()->format('H:i:s'))->first()
            || $this->timings()->where([['day', '=', Carbon::today()->format('l')]])->where('_from', '<=', 'Open')->where('_to', '>=', 'Open')->first()
        ) {
            return 'Open';
        } else {
            return 'Closed';
        }
    }

    public function employeeCount()
    {
        return $this->belongsTo('App\EmployeeCount', 'employee_count_id');
    }

}

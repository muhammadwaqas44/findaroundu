<?php

namespace App;

use App\Traits\FormatDates;
use App\Gallery;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
class Service extends Model
{
    use FormatDates;


//    protected $fillable = ['lat','long','description','created_by','title','profile_image','hourly_price','project_price','is_active','agent_admin_id','is_approve','video_url','facebook_url','gmail_url','twitter_url'];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
        static::addGlobalScope(new IsApproveScope());
    }


    public function getProfileImageAttribute($profile_image)
    {
        return asset($profile_image);
    }

    public function scopeActiveUserServices($query)
    {

        return $query->whereHas('createdBy',function($query){$query->where('is_active',1);});

    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class,  'service_id');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'service_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'pivot_categories_adds_business_services', 'service_id', 'category_id');
    }

    public function timings()
    {
        return $this->hasMany(Timing::class,  'service_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by')->withoutGlobalScope(ActiveScope::class);
    }


    public function tags()
    {
        return $this->belongsToMany('App\FauTag', 'pivot_faujobs_business_service_add_tags', 'service_id', 'fau_tag_id');
    }


    public function scopeLatestService($query)
    {
        return $query->sortBy('id', 'desc')->take(5);
    }

    public function getTimingStatusAttribute()
    {
        if($this->timings()->where([['day', '=', Carbon::today()->format('l')]])->where('_from','<=',Carbon::now()->format('H:i:s'))->where('_to','>=',Carbon::now()->format('H:i:s'))->first()
            || $this->timings()->where([['day', '=', Carbon::today()->format('l')]])->where('_from','<=','Open')->where('_to','>=','Open')->first())
        {
            return 'Open';
        }
        else{
            return 'Closed';
        }
    }


}

<?php

namespace App;

use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;
use App\Scopes\IsApproveScope;
use DB;

class Add extends Model
{
    use FormatDates;


//    protected $fillable = ['lat','long','created_by','is_approve','is_active', 'title', 'description', 'price', 'condition', 'profile_image','agent_admin_id'];
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
        static::addGlobalScope(new IsApproveScope());
    }

    public function scopeLatestAdds($query, $limit = 12)
    {
        if($limit != false){
            return $query->take($limit)->orderBy('id','desc');
        }else{
            return $query->orderby('id','desc');
        }
    }



    public function scopeActiveUserAdds($query)
    {

        return $query->whereHas('createdBy',function($query){$query->where('is_active',1);});

    }

    public function scopeTopViewed($query, $limit = 12)
    {
        if($limit != false){
            return $query->take($limit)->orderBy('id','desc');
        }else{
            return $query->orderby('id','desc');
        }
    }

    public function scopeTopRanked($query, $limit = 12)
    {
        if($limit != false){

            return $query->leftjoin('reviews', 'adds.id', '=', 'reviews.add_id')
                ->select(DB::raw('avg(rating) as average, adds.*'))->groupBy('adds.id')
                ->take($limit)->orderBy('average','desc');
        }else{
            return $query->leftjoin('reviews', 'adds.id', '=', 'reviews.add_id')
                ->select(DB::raw('avg(rating) as average, adds.*'))->groupBy('adds.id')
                ->take(8)->orderBy('average','desc');
        }
    }

    public function getProfileImageAttribute($profile_image)
    {
        return asset($profile_image);
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }




    public function address()
    {
        return $this->hasOne('App\Address', 'add_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'pivot_categories_adds_business_services', 'add_id', 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function timings()
    {
        return $this->hasMany(Timing::class,  'business_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class,  'add_id');
    }

    public function country()
    {
        return $this->belongsTo('App\MainCountry', 'main_country_id');
    }


    public function makers()
    {
        return $this->belongsTo('App\CategoryMaker', 'category_maker_id');
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

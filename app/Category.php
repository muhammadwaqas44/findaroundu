<?php

namespace App;

use App\Traits\FormatDates;
use App\Business;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use FormatDates;
    protected $fillable = ['profile_image','name','is_active','icon_image','parent_id','type','is_ad_type_or_make_req'];

    public function getProfileImageAttribute($profile_image)
    {
            return asset($profile_image);
    }

    public function getIconImageAttribute($icon_image)
    {
        return asset($icon_image);
    }

    public function business()
    {
        return $this->belongsToMany('App\Business', 'pivot_categories_adds_business_services', 'category_id', 'business_id');
    }

    public function adds()
    {
        return $this->belongsToMany('App\Add', 'pivot_categories_adds_business_services', 'category_id', 'add_id');
    }

    public function service()
    {
        return $this->belongsToMany('App\Service', 'pivot_categories_adds_business_services', 'category_id', 'service_id');
    }

    public function fauJob()
    {
        return $this->belongsToMany('App\FauJob', 'pivot_categories_adds_business_services', 'category_id', 'job_id');
    }


    public function childCate()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }



    public function scopeIndividual($query)
    {
        return $query->where('type', 'Individual');
    }

    public function scopeAdd($query)
    {
        return $query->where('type', 'Adds');
    }


    public function scopeBusinessCat($query)
    {
        return $query->where('type', 'Business');
    }


    public function scopeBusinessType($query)
    {
        return $query->where('type', 'Business');
    }




    public function scopeTasks($query)
    {
        return $query->where('type', 'Task');
    }


    public function scopeShopping($query)
    {
        return $query->where('type', 'Shopping');
    }


    public function tags()
    {
        return $this->belongsToMany(FauTag::Class, 'pivot_cate_tags', 'category_id', 'fau_tag_id');
    }


    public function scopeProfessional($query)
    {
        return $query->where('type', 'Professionals');
    }


    public function scopeIndividualLatest($query, $limit = 12)
    {
        if($limit != false){
            return $query->where('type','Individual')->orderby('id','desc')->limit($limit);
        }else{
            return $query->where('type','Individual')->orderby('id','desc');
        }
    }

    public function scopeIndividualPopular($query, $limit = 12)
    {
        if($limit != false){
            return $query->where('type','Individual')->withCount('service')->orderby('service_count','desc')->limit($limit);
        }else{
            return $query->where('type','Individual')->withCount('service')->orderby('service_count','desc');
        }
    }

    public function scopeServicePopular($query, $limit = 12)
    {
        if($limit != false){
            return $query->where('type','Professionals')->withCount('service')->orderby('service_count','desc')->limit($limit);
        }else{
            return $query->where('type','Professionals')->withCount('service')->orderby('service_count','desc');
        }
    }



    public function scopeServiceCategoryPopular($query, $limit = 12)
    {
        if($limit != false){
            return $query->withCount('service')->orderby('service_count','desc')->limit($limit);
        }else{
            return $query->withCount('service')->orderby('service_count','desc');
        }
    }

    public function scopeBusinessCategoryPopular($query, $limit = 12)
    {
        if($limit != false){
            return $query->withCount('business')->orderby('business_count','desc')->limit($limit);
        }else{
            return $query->withCount('business')->orderby('business_count','desc');
        }
    }

    public function scopeAddCategoryPopular($query, $limit = 12)
    {
        if($limit != false){
            return $query->withCount('adds')->orderby('adds_count','desc')->limit($limit);
        }else{
            return $query->withCount('adds')->orderby('adds_count','desc');
        }
    }


    public function getImageProfileAttribute($profile_image)
    {
            return asset($profile_image);
    }

    public function scopeCompanyPopularNdLatest($query, $limit = 12)
    {
        return $query->where('type','Company')->orderby('id','desc')->limit($limit);
    }

    public function tag()
    {
        return $this->hasMany('App\FauTag');
    }

//    public function scopeMainSearchCategories($query){
//        return $query->whereIn('id','');
//    }

    public function countries(){
        return $this->belongsToMany('App\MainCountry', 'pivot_category_country', 'category_id', 'country_id')->withPivot('order_no', 'type')->withTimestamps();

    }

    public function parent(){
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }

    public function children(){
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public static function tree(){
        return static::where('parent_id', '=', null)->get();
    }
}

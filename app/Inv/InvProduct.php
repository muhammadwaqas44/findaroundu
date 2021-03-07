<?php

namespace App\Inv;

use Illuminate\Database\Eloquent\Model;

class InvProduct extends Model
{
    //
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'inv_pivot_categories_products', 'product_id', 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function gallery()
    {
        return $this->hasMany('App\Inv\InvProductGallery',  'product_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Inv\InvProductReview','product_id');
    }

    public function orderDetail(){
        return $this->hasMany('App\Inv\InvProductOrderDetail', 'product_id');
    }

    public function business(){
        return $this->belongsTo('App\Business','business_id');
    }

}

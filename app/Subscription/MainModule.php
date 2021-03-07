<?php

namespace App\Subscription;

use Illuminate\Database\Eloquent\Model;

class MainModule extends Model
{
    protected $fillable = ['name','icon_image_url','icon_code','active','stripe_product_id'];

    public function getActiveAttribute(){
        if($this->attributes['active'] == '1'){
            return "Active";
        }else{
            return "Deactive";
        }
    }




    public function menues()
    {
        return $this->hasMany(MainErpMenu::class,  'module_id');
    }

    public function packages()
    {
        return $this->hasMany(SubscriptionPlanPackage::class,'module_id');
    }



}

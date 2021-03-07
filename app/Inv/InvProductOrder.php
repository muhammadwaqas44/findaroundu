<?php

namespace App\Inv;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDates;

class InvProductOrder extends Model
{
    use FormatDates;

    public function orderDetail(){
        return $this->hasMany('App\Inv\InvProductOrderDetail', 'order_id');
    }

    public function currencyDetail(){
        return $this->belongsTo('App\MainCurrency', 'currency_id');
    }

    public function userDetail(){
        return $this->belongsTo('App\User', 'user_id');
    }
}

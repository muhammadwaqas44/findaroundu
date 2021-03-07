<?php

namespace App\Inv;

use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class InvProductOrderDetail extends Model
{
    use FormatDates;

    public function order(){
        return $this->belongsTo('App\Inv\InvProductOrder', 'order_id');
    }

    public function product(){
        return $this->belongsTo('App\Inv\InvProduct', 'product_id');
    }
}

<?php

namespace App\Subscription;

use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Model;

class SubscriptionInvoice extends Model
{
    protected $fillable = ['total_amount','setup_price','plan_price','created_by','description','invoice_name','subscription_id','subscription_plan_id','is_paid'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function payment()
    {
        return $this->hasOne(SubscriptionInvoicePaymentMethod::class, 'subscription_invoice_id');
    }

    public function billing()
    {
        return $this->hasOne(SubscriptionInvoiceBilling::class, 'subscription_invoice_id');
    }

}

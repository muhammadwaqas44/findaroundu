<?php

namespace App\Subscription;

use Illuminate\Database\Eloquent\Model;
class SubscriptionInvoicePaymentMethod extends Model
{
    protected $table = "subscription_inv_pay_meth";
    protected $fillable = ['first_name','last_name','card_number','expiry','cvv','subscription_invoice_id'];
}

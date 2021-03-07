<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\SubscriptionInvoice;
use App\Subscription\SubscriptionInvoiceBilling;
use App\Subscription\SubscriptionInvoicePaymentMethod;
use App\User;
use Auth;
use Carbon\Carbon;


class InvoiceServices
{


    private $invoicePagination = 5;





    public function deleteInvoice($addonId)
    {
        SubscriptionAddon::destroy($addonId);
        return 'success';
    }


    public function addInvoiceNotes($addonId, $request)
    {
        SubscriptionAddon::find($addonId)->update(['invoice_notes' => $request->invoice_notes]);
        return 'success';
    }

    public function deleteInvoiceNotes($addonId)
    {
        SubscriptionAddon::find($addonId)->update(['invoice_notes' => NULL]);
        return 'success';
    }


    public function addCommentsNotes($addonId, $request)
    {
        SubscriptionAddon::find($addonId)->update(['comments' => $request->comments]);
        return 'success';
    }

    public function deleteCommentNotes($addonId)
    {
        SubscriptionAddon::find($addonId)->update(['comments' => NULL]);
        return 'success';
    }


    public function getInvoices($request)
    {

        if ($request->sort_by == "oldest" && $request->has('search') && $request->search != "") {

            $data['all_invoices'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif (($request->has('user_id') && !$request->has('sort_by') && ($request->search == "" || !$request->has('search'))) || ($request->has('user_id') && $request->has('sort_by') == "asc") && ($request->search == "" || !$request->has('search'))) {

            $data['all_invoices'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'asc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'asc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'asc')->count();

        } elseif ($request->has('user_id') && $request->sort_by == "oldest" && ($request->search == "" || !$request->has('search'))) {

            $data['all_invoices'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'desc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::where('user_id', $request->user_id)->orderBy('id', 'desc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_invoices'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_invoices'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_invoices'] = SubscriptionInvoice::orderBy('id', 'asc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::orderBy('id', 'asc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_invoices'] = SubscriptionInvoice::orderBy('id', 'desc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::orderBy('id', 'desc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::orderBy('id', 'desc')->count();

        } else {

            $data['all_invoices'] = SubscriptionInvoice::orderBy('id', 'desc')->simplePaginate($this->invoicePagination);
            $data['total_pages'] = SubscriptionInvoice::orderBy('id', 'desc')->paginate($this->invoicePagination);
            $data['all_invoices_count'] = SubscriptionInvoice::orderBy('id', 'desc')->count();

        }


        $request->flash();
        return $data;
    }


    public function addInvoiceBilling($request, $subscription, $invoice)
    {
        SubscriptionInvoiceBilling::create([
            'email' => $request->email,
            'address' => $request->address,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'subscription_invoice_id' => $invoice->id,
            'company_name' => $request->company_name,
            'zip' => $request->zip,
            'country_id' => 11,
            'city' => 11,
            'phone' => $request->phone
        ]);

    }


    public function addInvoicePayment($address, $invoice)
    {
        $address = $address->toArray();

        SubscriptionInvoicePaymentMethod::create(array_merge($address,['subscription_invoice_id'=>$invoice->id]));
    }


    public function createInvoice($subscription, $request)
    {
        $planPrice = 0;
        $setupPrice = 0;

        if ($subscription->plan->pricingModel->first()->name == "Flat Fee") {
            $planPrice = $subscription->plan->pricingModel->first()->pivot->price;
            $setupPrice = $subscription->plan->pricingModel->first()->pivot->setup_price;
            $total = $setupPrice + $planPrice;
        }
        $invoice = SubscriptionInvoice::create([
            "created_by" => Auth::user()->id,
            "is_paid" => 'due',
            'plan_price' => $planPrice,
            'setup_price' => $setupPrice,
            'total_amount' => $total,
            "subscription_id" => $subscription->id,
            'invoice_name' => str_replace(' ', '_', $subscription->name) . "_" . $subscription->id,
        ]);

        Self::addInvoicePayment($subscription->user->cards()->where('primary',1)->first(),$invoice);

        if ($request->shipping_to_bill_address == 0) {
            Self::addInvoiceBilling($request, $subscription, $invoice);
        } else {
            if ($subscription->user->billingInfo()->count() != 0) {
                Self::addInvoiceBilling($subscription->user->billingInfo, $subscription, $invoice);
            }

        }


        return "success";
    }

}
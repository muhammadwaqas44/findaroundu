<?php
/**
 * Created by PhpStorm.
 * User: YousafKhan
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

namespace App\Services;

use App\Subscription\SubscriptionPlan;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class PlanServices
{
    private $planPagination = 5;

    public function deletePlan($planId)
    {
        SubscriptionPlan::destroy($planId);
        return 'success';
    }


    public function addInvoiceNotes($planId, Request $request)
    {
        SubscriptionPlan::find($planId)->update($request->except(['_token']));
        return 'success';
    }

    public function addComments($planId, Request $request)
    {
        SubscriptionPlan::find($planId)->update($request->except(['_token']));
        return 'success';
    }

    public function deleteComment($planId)
    {
        SubscriptionPlan::find($planId)->update(['comment' => NULL]);
        return 'success';
    }


    public function deleteInvoiceNote($planId)
    {
        SubscriptionPlan::find($planId)->update(['invoice_name' => NULL]);
        return 'success';
    }

    public function getPlans($request)
    {

        if ($request->sort_by == "oldest" && $request->has('search')) {

            $data['all_plans'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->count();

        } elseif ($request->has('search') && $request->sort_by == "") {

            $data['all_plans'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::where('company_name', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->count();

        } elseif ($request->has('search') && $request->sort_by == "latest") {

            $data['all_plans'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->count();

        } elseif ($request->search = "" && $request->sort_by == "oldest") {

            $data['all_plans'] = SubscriptionPlan::orderBy('id', 'asc')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::orderBy('id', 'asc')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::orderBy('id', 'asc')->count();

        } elseif ($request->search == "" && $request->sort_by == "latest") {

            $data['all_plans'] = SubscriptionPlan::orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::orderBy('id', 'desc')->count();

        } else {

            $data['all_plans'] = SubscriptionPlan::orderBy('id', 'desc')->simplePaginate($this->planPagination);
            $data['total_pages'] = SubscriptionPlan::orderBy('id', 'desc')->paginate($this->planPagination);
            $data['all_plans_count'] = SubscriptionPlan::orderBy('id', 'desc')->count();

        }


        $request->flash();
        return $data;
    }
}
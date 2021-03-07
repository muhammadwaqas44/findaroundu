<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/26/2019
 * Time: 3:48 PM
 */

namespace App\Services;


use App\Subscription\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GatesServices
{

    static function ads($user)
    {
        if ($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first() == null) {
            return false;
        }

        if ($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->duration == 'week')
        {
            $startDate = Carbon::parse($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->adds()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() <
                $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity)
            {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        elseif ($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->duration == 'month')
        {
            if ($user->adds->count() < $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity)
            {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds->count() - $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        elseif ($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->bill_period_unit == 'Week' &&
            $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->duration == 'week')
        {

            if ($user->adds->count() < $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds->count() - $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        else if ($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->duration == 'week')
        {

            $startDate = Carbon::parse($user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->adds()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Add')->first()->id)->first()->duration == 'month')
        {

            $startDate = Carbon::parse($user->subscriptions()->where('cancelled_at', '=', NULL)->first()->start_date);

            $currentDate = Carbon::now();

            $diff = $startDate->diffInMonths($currentDate);


            $date = $startDate->format('d');
            $previousDate = $startDate->subDay()->format('d');

            $now = \Carbon\Carbon::now();

            $month_start_date = Carbon::create($now->format('Y'), $now->format('m'), $date, 0, 0, 0);
            $month_end_date = Carbon::create($now->format('Y'), $now->addMonth()->format('m'), $previousDate, 0, 0, 0);

            if ($user->adds()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        else if ($user->subscriptions->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->duration == 'year')
        {

            if ($user->adds->count() < $user->subscriptions->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->adds->count() - $user->subscriptions()->whereNull('cancelled_at')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Adds')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;

                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Adds')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }


    }

    static function services($user)
    {
        if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first() == null) {
            return false;
        }


        if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'week')
        {

            $startDate = Carbon::parse($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->services()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() < $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;



                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        elseif ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'month')
        {

            if ($user->services->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;




                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        elseif ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Week' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'week')
        {

            if ($user->services->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;



                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'week')
        {

            $startDate = Carbon::parse($user->subscriptions->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->services()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() < $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;



                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'month')
        {

            $startDate = Carbon::parse($user->subscriptions()->where('cancelled_at', '=', NULL)->first()->start_date);

            $currentDate = Carbon::now();

            $diff = $startDate->diffInMonths($currentDate);

            //custom month start and end date

            $date = $startDate->format('d');
            $previousDate = $startDate->subDay()->format('d');

            $now = \Carbon\Carbon::now();

            $month_start_date = Carbon::create($now->format('Y'), $now->format('m'), $date, 0, 0, 0);
            $month_end_date = Carbon::create($now->format('Y'), $now->addMonth()->format('m'), $previousDate, 0, 0, 0);

            if ($user->services()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;



                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();

                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->duration == 'year')
        {

            if ($user->services->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity) {
                return true;
            }
            else
            {
                $totalBusiness = $user->services->count()  - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Services')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;



                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Services')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
    }

    static function business($user)
    {
        if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first() == null) {
            return false;
        }


        if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'week')
        {

            $startDate = Carbon::parse($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->businesses()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() < $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity)
            {
                return true;
            }
            else{
                $totalBusiness = $user->businesses()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;

//                dd($user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons);

                $joinFlat = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        elseif ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Month' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'month')
        {

            if ($user->businesses->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity) {
                return true;
            }
            else{
                $totalBusiness = $user->businesses->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        elseif ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Week' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'week')
        {

            if ($user->businesses->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity) {
                return true;
            }
            else{
                $totalBusiness = $user->businesses->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'week')
        {

            $startDate = Carbon::parse($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->start_date);
            $currentDate = Carbon::now();
            $diff = $startDate->diffInWeeks($currentDate);

            $currentdayNumber = $startDate->copy()->dayOfWeek;
            $beforedayNumber = $startDate->copy()->subDay()->dayOfWeek;
            Carbon::setWeekStartsAt($currentdayNumber);
            Carbon::setWeekEndsAt($beforedayNumber);

            $weekStartDate = $startDate->copy()->addWeek($diff)->startOfWeek();
            $weekEndDate = $startDate->copy()->addWeek($diff)->endOfWeek();

            if ($user->businesses()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity) {
                return true;
            }
            else{
                $totalBusiness = $user->businesses()->whereBetween('created_at', [$weekStartDate, $weekEndDate])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'month')
        {

            $startDate = Carbon::parse($user->subscriptions->where('cancelled_at', '=', NULL)->start_date);

            $currentDate = Carbon::now();

            $diff = $startDate->diffInMonths($currentDate);

            //custom month start and end date

            $date = $startDate->format('d');
            $previousDate = $startDate->subDay()->format('d');

            $now = \Carbon\Carbon::now();

            $month_start_date = Carbon::create($now->format('Y'), $now->format('m'), $date, 0, 0, 0);
            $month_end_date = Carbon::create($now->format('Y'), $now->addMonth()->format('m'), $previousDate, 0, 0, 0);


            if ($user->businesses()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity) {
                return true;
            }
            else{
                $totalBusiness = $user->businesses()->whereBetween('created_at', [$month_start_date, $month_end_date])->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        else if ($user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->bill_period_unit == 'Year' &&
            $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->duration == 'year')
        {
            if ($user->businesses->count() < $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity) {
                return true;
            }
            else{
                $totalBusiness = $user->businesses->count() - $user->subscriptions()->where('cancelled_at', '=', NULL)->where('active', 'active')->first()->plan->planFeatures->where('site_id', Site::where('name', 'Business')->first()->id)->first()->quantity;

                $add_ons = $user->subscriptions()->where('subscription_status', 'active')->where('active', 'active')->first()->addons;


                $joinFlat = $user->subscriptions()
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_plan_features','subscription_pivot_addons.subscription_addon_id','subscription_plan_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_plan_features.quantity) as sum_flat"))
                    ->where('subscription_plan_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $joinUnit = $user->subscriptions()
                    ->join('subscription_pivot_addons','subscriptions.id','subscription_pivot_addons.subscription_id')
                    ->join('subscription_addon_unit_features','subscription_pivot_addons.subscription_addon_id','subscription_addon_unit_features.subscription_addon_id')
                    ->select( DB::raw("sum(subscription_addon_unit_features.quantity) as sum_unit"))
                    ->where('subscriptions.subscription_status', 'active')
                    ->where('subscriptions.active', 'active')
                    ->where('subscription_addon_unit_features.site_id',Site::where('name', 'Business')->first()->id)
                    ->first();


                $totalAddOn = $joinUnit->sum_unit + $joinFlat->sum_flat;


                if($totalBusiness < $totalAddOn )
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }

}
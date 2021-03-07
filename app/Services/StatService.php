<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Stat;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Helpers\ImageHelpers;


class StatService
{
    private $statsPagination = 100;

    public function getAllStatsAdmin($request)
    {
        $data['all_stats'] = Stat::withoutGlobalScopes();
        $data['total_stats'] = Stat::withoutGlobalScopes();
        $data['all_stats_count'] = Stat::withoutGlobalScopes();

        if ($request->filled('sort_by')) {
            if($request->sort_by == 'oldest'){
                $sortBy = 'asc';
            }else{
                $sortBy = 'desc';
            }
            $data['all_stats'] = $data['all_stats']->orderBy('id', $sortBy);
            $data['total_stats'] = $data['total_stats']->orderBy('id', $sortBy);
            $data['all_subscriptions_count'] = $data['all_stats_count']->orderBy('id', $sortBy);
        }


        if ($request->filled('search')) {

            $data['all_stats'] = $data['all_stats']->where('title', 'like', '%' . $request->search . '%');
            $data['total_stats'] = $data['total_stats']->where('title', 'like', '%' . $request->search . '%');
            $data['all_subscriptions_count'] = $data['all_stats_count']->where('title', 'like', '%' . $request->search . '%');
        }

        $data['all_stats'] = $data['all_stats']->simplePaginate($this->statsPagination);
        $data['total_stats'] = $data['total_stats']->paginate($this->statsPagination);
        $data['all_stats_count'] = $data['all_stats_count']->count();
        return $data;
    }


    public function changeStatStatus($id)
    {
        $stat = Stat::withoutGlobalScopes()->find($id);

        if ($stat->is_active == 0) {
            $stat->update(['is_active' => 1]);
            session()->flash('degree-status-active', $stat->title . " Activated.");

        } else {
            $stat->update(['is_active' => 0]);
            session()->flash('degree-status-deactive', $stat->title . " DeActivated.");
        }
    }


    public function addStat($request)
    {
        Stat::create([$request->except('_token')]);
    }

    public function postStat($request)
    {
        $fileName = time() . "-" . rand(10, 1000000) . $request->title . ".png";
        ImageHelpers::updateProfileImage('project-assets/images/stats/', $request->file('image'), $fileName);
        Stat::create(array_merge($request->except('_token'), ['image' => "project-assets/images/stats/" . $fileName, 'is_active' => 1]));


    }


}
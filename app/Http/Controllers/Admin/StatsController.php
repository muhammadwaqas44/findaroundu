<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StatService;
use App\Stat;

class StatsController extends Controller
{
    public function addStat()
    {
        return view('Admin.Stats.new-stat');
    }

    public function postStat(Request $request, StatService $statService){
        $statService->postStat($request);
        return redirect()->route('admin.all-stats');
    }

    public function allStats(Request $request, StatService $statsService)
    {
        $data['all_stats'] = $statsService->getAllStatsAdmin($request);
       // dd($data['all_stats']);
        return view('Admin.Stats.all-stats', compact('data'));
    }

    public function deleteStat($statId)
    {
        Stat::withoutGlobalScopes()->find($statId)->delete();
        return redirect()->route('admin.all-stats');
    }

    public function changeStatStatus($id, StatService $statsService){
        $statsService->changeStatStatus($id);
        return redirect()->back();
    }

}

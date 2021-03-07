<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function agentDashboard(){
        return view('Agent.Dashboard.dashboard');
    }
}

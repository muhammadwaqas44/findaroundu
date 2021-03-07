<?php

namespace App\Http\Controllers\User;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function userDashboard(){
        $user = User::withoutGlobalScopes()->find(Auth::user()->id);
        $data['services'] = $user->services()->count();
        $data['businesses'] = $user->businesses()->count();
        $data['adds'] = $user->adds()->count();
        return view('User.Dashboard.dashboard', compact('data'));
    }
}

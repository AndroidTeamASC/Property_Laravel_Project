<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard');
    }

    public function agentDashboard()
    {
        return view('backend.agent_dashboard');
    }
    public function agentProfile()
    {
        return view('backend.profile.agent');
    }
    public function adminProfile()
    {
        return view('backend.profile.admin');
    }
}

<?php

// AdminDashboardController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // dd('aaaaaaaaa');
        return view('admin.dashboard.index');
    }
}

// UserDashboardController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}

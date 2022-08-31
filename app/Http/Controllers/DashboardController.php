<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function app()
    {
        return view('_app');
    }

    public function index()
    {
        return view('pages.dashboard');
    }
}

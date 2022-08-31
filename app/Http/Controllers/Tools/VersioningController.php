<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class VersioningController extends Controller
{
    public function index()
    {
        return view('pages.tools.versioning');
    }
}

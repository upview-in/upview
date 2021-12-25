<?php

namespace App\Http\Controllers\AppModules;

use App\Http\Controllers\Controller;

class AppModuleController extends Controller
{
    public function index()
    {
        return view('user.site_packages');
    }
}

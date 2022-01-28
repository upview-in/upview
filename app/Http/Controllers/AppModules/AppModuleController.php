<?php

namespace App\Http\Controllers\AppModules;

use App\Http\Controllers\Controller;
use UserPermissionHelper;

class AppModuleController extends Controller
{
    public function index()
    {
        $packages = (new UserPermissionHelper)->getGroups();
        dd($packages);
        return view('user.site_packages');
    }
}

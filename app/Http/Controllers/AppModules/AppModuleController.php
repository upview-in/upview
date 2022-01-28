<?php

namespace App\Http\Controllers\AppModules;

use App\Http\Controllers\Controller;
use UserPermissionHelper;

class AppModuleController extends Controller
{
    public function index()
    {
        $packages = (new UserPermissionHelper)->getGroups();
        return view('user.site_packages');
    }
}

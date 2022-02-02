<?php

namespace App\Http\Controllers\AppModules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Packages\PackageDetail;
use UserPermissionHelper;

class AppModuleController extends Controller
{
    public function index()
    {
        $pack = (new UserPermissionHelper)->getGroups();
        return view('user.site_packages', ['packages'=>$pack]);
    }

    public function packageDetails(PackageDetail $request)
    {
        return view('user.package_detail');
    }
}

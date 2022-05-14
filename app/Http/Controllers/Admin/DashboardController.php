<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\MainDashboardRequest;
use App\Http\Requests\Admin\Dashboard\PHPInfoRequest;
use App\Http\Requests\Admin\Dashboard\ServerInfoRequest;

class DashboardController extends Controller
{
    public function main(MainDashboardRequest $request)
    {
        return view('admin.dashboard.main');
    }

    public function serverInfo(ServerInfoRequest $request)
    {
        return view('admin.dashboard.server-info');
    }

    public function phpInfo(PHPInfoRequest $request)
    {
        return view('admin.dashboard.phpinfo');
    }
}

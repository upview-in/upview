<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LinkedAccounts;
use App\Models\Report;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', self::getDashboardData());
    }

    private static function getDashboardData()
    {
        $user = Auth::user();
        $lnkedAccountsCount = LinkedAccounts::where('user_id', $user->id)->count() ?? 0;
        $totalReports = Report::where('user_id', $user->id)->count() ?? 0;
        $modulesActive = implode(', ', Auth::user()->roles()->pluck('name')->toArray());

        return ['linkedAccountsCount'=>$lnkedAccountsCount, 'totalReports'=>$totalReports, 'accountLevel'=>$modulesActive];
    }

    public function maintenance()
    {
        return view('layouts.maintenance');
    }

    public function invoice()
    {
        return view('payment-gateway.template.one');
    }
}

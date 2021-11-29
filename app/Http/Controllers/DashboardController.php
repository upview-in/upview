<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkedAccounts;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    function index()
    {
        return view('user.dashboard', DashboardController::getDashboardData());
    }

    private static function getDashboardData()
    {
        $user = Auth::user();
        $lnkedAccountsCount = LinkedAccounts::where('user_id', $user->id)->count() ?? 0;
        $totalReports = Reports::where('user_id', $user->id)->count() ?? 0;
        $accountLevel = "From web.php";

        $modulesActive = 0; /* get from dabatase later */

        switch($modulesActive)
        {
            case 1:
        }

        $data = ["linkedAccountsCount"=>$lnkedAccountsCount, "totalReports"=>$totalReports, "accountLevel"=>$accountLevel];
        return $data;
    }
}

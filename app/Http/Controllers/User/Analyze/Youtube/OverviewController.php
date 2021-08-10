<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Helper\TokenHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function overview(Request $request)
    {
        if (!count(TokenHelper::getAuthToken_YT())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }
        return view('user.analyze.youtube.overview');
    }
}

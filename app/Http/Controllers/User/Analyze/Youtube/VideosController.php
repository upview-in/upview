<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Helper\TokenHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function videos(Request $request)
    {
        if (!count(TokenHelper::getAuthToken_YT())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }
        return view('user.analyze.youtube.videos');
    }
}

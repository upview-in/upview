<?php

namespace App\Http\Controllers\User\PostScheduling;

use App\Http\Controllers\Controller;
use App\Models\PostHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostHistoryController extends Controller
{
    public function index(Request $request)
    {
        $postHistory = PostHistory::with('profile')->where(['user_id' => Auth::id()])->get();

        return view('user.post_scheduling.post_history', ['postHistory'=>$postHistory]);
    }
}

<?php

namespace App\Http\Controllers\User\PostScheduler;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PostScheduler\ViewPostHistoryRequest;
use App\Models\PostHistory;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(ViewPostHistoryRequest $request)
    {
        $postHistory = PostHistory::with('profile')->where(['user_id' => Auth::id()])->get();

        return view('user.post.history', ['postHistory'=>$postHistory]);
    }
}

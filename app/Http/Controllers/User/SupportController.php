<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserQueryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserSupport;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support_form');
    }

    public function uploadUserQuery(UserQueryRequest $request)
    {
        $user = Auth::user();
        $supportQuery = new UserSupport();
        $supportQuery->query_title = $request->query_title;
        $supportQuery->query_description = $request->query_description;
        $supportQuery->user_id = $user->id;
        $supportQuery->status = 0;
        if($request->hasFile('query_ss'))
        {
            $supportQuery->query_ss_name = $request->file('query_ss')->store('Support');
        }
        $supportQuery->save();
        return redirect()->back()->with('message', 'Query Raised!');
    }

}

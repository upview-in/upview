<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\UserQueryRequest;
use App\Http\Requests\Support\SupportChatRequest;
use App\Http\Requests\Support\CancelQuery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserSupport;

// use Carbon\Carbon;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support_form');
    }

    public function history()
    {
        $SupportHistory = UserSupport::where(['user_id' => Auth::id()])->get();
        return view('user.support_form_history', ['SupportHistory' => $SupportHistory,'user_id' => Auth::id()]);
    }

    public function uploadUserQuery(UserQueryRequest $request)
    {
        $user = Auth::user();
        $supportQuery = new UserSupport();
        $supportQuery->query_title = $request->query_title;
        $supportQuery->query_description = $request->query_description;
        $supportQuery->user_id = $user->id;
        $supportQuery->status = 0;
        if ($request->hasFile('query_ss')) {
            $supportQuery->query_ss_name = $request->file('query_ss')->store('Support');
        }
        $supportQuery->save();
        return redirect()->back()->with('message', 'Query Raised!');
    }

    public function cancelQueryByUser(CancelQuery $request, UserSupport $userSupport)
    {
        $userSupport->remark = "Closed by User";
        $userSupport->status = 2;
        // $userSupport->resolved_at = Carbon::now()->toDateTimeString();
        $userSupport->update();
        return redirect()->back()->with('message', 'Query Closed by User!');

    }

    public function supportChat(SupportChatRequest $request)
    {
        return view('user.support_chat');
    }

}

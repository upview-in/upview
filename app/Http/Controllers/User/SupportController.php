<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\CancelQuery;
use App\Http\Requests\Support\SupportChatRequest;
use App\Http\Requests\Support\UserQueryRequest;
use App\Models\UserSupportQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support_form');
    }

    public function history()
    {
        $SupportHistory = UserSupportQuery::where(['user_id' => Auth::id()])->get();

        return view('user.support_form_history', ['SupportHistory' => $SupportHistory, 'user_id' => Auth::id()]);
    }

    public function uploadUserQuery(UserQueryRequest $request)
    {
        $user = Auth::user();
        $supportQuery = new UserSupportQuery();
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

    public function cancelQueryByUser(CancelQuery $request, UserSupportQuery $userSupport)
    {
        $userSupport->remark = 'Closed by User';
        $userSupport->status = 2;
        $userSupport->resolved_at = Carbon::now();
        $userSupport->update();

        return redirect()->back()->with('message', 'Query Closed by User!');
    }

    public function supportChat(SupportChatRequest $request)
    {
        return view('user.support_chat');
    }
}

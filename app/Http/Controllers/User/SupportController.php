<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Support\CancelQuery;
use App\Http\Requests\User\Support\SupportChatRequest;
use App\Http\Requests\User\Support\UserQueryRequest;
use App\Models\UserSupportQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        return view('user.support.form');
    }

    public function history()
    {
        $SupportHistory = UserSupportQuery::search()->with('supportUser')->where(['user_id' => Auth::id()])->paginate(10);

        return view('user.support.history', ['SupportHistory' => $SupportHistory, 'user_id' => Auth::id()]);
    }

    public function uploadUserQuery(UserQueryRequest $request)
    {
        $user = Auth::user();
        $supportQuery = new UserSupportQuery();
        $supportQuery->query_title = $request->query_title;
        $supportQuery->query_description = $request->query_description;
        $supportQuery->user_id = $user->id;
        $assignee = $supportQuery->setAssignee();
        $supportQuery->save();

        if ($request->hasFile('attachments')) {
            foreach ($request->attachments as $attachment) {
                $supportQuery->addMedia($attachment)->toMediaCollection('query-attachments');
            }
        }

        return redirect()->back()->with('message', $assignee ? 'Query Raised! Check history to view your query.' : 'No agent found or some technical issue to assign our executive!');
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
        $supportQueryId = UserSupportQuery::where(['_id' => $request->id])->exists();
        if ($supportQueryId) {
            return view('user.support.chat');
        }

        return abort(404);
    }
}

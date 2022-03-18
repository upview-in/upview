<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSupportChat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('support.chat.index');
    }

    public function users(Request $request)
    {
        if ($request->has('q') && !is_null($request->q) && !empty($request->q)) {
            $usersList = User::select('id', 'name', 'email')->with('userSupportChatUnseen', 'userSupportChat')->where(function ($query) use ($request) {
                $query->orWhere('name', 'like', '%' . $request->q . '%');
                $query->orWhere('email', 'like', '%' . $request->q . '%');
            })->get()->each->append('userSupportChatCount')->where('userSupportChatCount', '>', 0);
        } else {
            $usersList = User::select('id', 'name', 'email')->with('userSupportChatUnseen', 'userSupportChat')->get()->each->append('userSupportChatCount')->where('userSupportChatCount', '>', 0);
        }

        $arr = $usersList->toArray();
        usort($arr, function ($a, $b) {
            if (!empty($a["support_chat_unseen"])) {
                return ($a["support_chat_unseen"][0]["created_at"] >= $b["support_chat_unseen"][0]["created_at"]) ? -1 : 1;
            } else {
                return 1;
            }
        });

        $data = $arr;
        $hash = md5(json_encode($data));
        if (isset($_POST['hash']) && !empty($_POST['hash']) && $_POST['hash'] == $hash) {
            $data = [];
        }
        return response()->json(["hash" => $hash, "data" => $data]);
    }

    public function messages(Request $request)
    {
        if (!$request->has(['last_message_id', 'userID'])) {
            return abort(400);
        }
        UserSupportChat::where('user_id', $request->userID)->whereNull('seen_by_support_user')->update(['seen_by_support_user' => Carbon::now()]);
        $messages = UserSupportChat::where('user_id', $request->userID);

        if (!is_null($request->last_message_id)) {
            $messages->where('_id', '>', $request->last_message_id);
        }
        return response()->json($messages->get());
    }

    public function sendMessage(Request $request)
    {
        if (!$request->has(['sendTo', 'message']) && !empty($request->message) && !empty($request->sendTo)) {
            return abort(400);
        }

        $message = new UserSupportChat();
        $message->user_id = $request->sendTo;
        $message->support_user_id = supportUser()->id;
        $message->message = $request->message;
        $message->is_sended_by_user = false;
        $message->save();

        return response()->json(['status' => 200, 'message' => 'Sended']);
    }

    public function seenStatus(Request $request)
    {
        if (!$request->has(['ids', 'userID'])) {
            return abort(400);
        }

        $filtered_ids = [];
        foreach ($request->ids as $id) {
            if (is_numeric($id)) {
                $filtered_ids[] = $id;
            }
        }

        $res = UserSupportChat::where('user_id', $request->userID)->whereIn('id', $filtered_ids)->get();
        return response()->json($res);
    }
}

<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\SupportUser;
use App\Models\UserSupportChat;
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
            $usersList = SupportUser::select('id', 'first_name', 'last_name', 'email')->withCount(['supportChat', 'supportChatUnseen'])->having('support_chat_count', '>', 0)->with('supportChatUnseen')->where(function ($query) use ($request) {
                $query->orWhere('email', 'like', '%' . $request->q . '%');
                $query->orWhere(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', '%' . $request->q . '%');
                $query->orWhere(DB::raw("CONCAT(last_name,' ',first_name)"), 'like', '%' . $request->q . '%');
            })->get();
        } else {
            $usersList = SupportUser::select('id', 'first_name', 'last_name', 'email')->withCount(['supportChat', 'supportChatUnseen'])->having('support_chat_count', '>', 0)->with('supportChatUnseen')->get();
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
        if (!$request->has(['last_message_id', 'visitorID'])) {
            return abort(400);
        }
        UserSupportChat::where('user_id', $request->visitorID)->whereNull('seen_by_system')->update(['seen_by_system' => Carbon::now()]);
        $messages = UserSupportChat::where('user_id', $request->visitorID);

        if (!is_null($request->last_message_id)) {
            $messages->where('id', '>', $request->last_message_id);
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
        $message->support_user_id = 0;
        $message->message = $request->message;
        $message->save();

        return response()->json(['status' => 200, 'message' => 'Sended']);
    }

    public function seenStatus(Request $request)
    {
        if (!$request->has(['ids', 'visitorID']) || !is_numeric($request->visitorID)) {
            return abort(400);
        }

        $filtered_ids = [];
        foreach ($request->ids as $id) {
            if (is_numeric($id)) {
                $filtered_ids[] = $id;
            }
        }

        $res = UserSupportChat::where('user_id', $request->visitorID)->whereIn('id', $filtered_ids)->get();
        return response()->json($res);
    }
}

<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Comment\GetCommentThreadFromVideoID;

class CommentController extends Controller
{
    public function getCommentThreadFromVideoID(GetCommentThreadFromVideoID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $commentThread = $service->commentThreads->listCommentThreads('id,replies,snippet', ['videoId' => $request->id, 'maxResults' => 30]);
        return response()->json($commentThread, 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\GetChannelDetailsFromID;
use App\Http\Requests\Api\Youtube\GetChannelListFromName;
use App\Http\Requests\Api\Youtube\GetCommentThreadFromVideoID;
use App\Http\Requests\Api\Youtube\GetVideoDetailsFromVideoID;
use App\Http\Requests\Api\Youtube\GetVideoListFromChannelID;

class YoutubeController extends Controller
{
    public function getChannelListFromName(GetChannelListFromName $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->search->listSearch(
            'id',
            [
                'q' => $request->channelName,
                'type' => 'channel',
                'maxResults' => 2,
            ]
        );

        $channelList = collect();
        foreach ($result as $value) {
            $channelList->push($service->channels->listChannels('id,snippet,statistics', ['id' => $value->id->channelId]));
        }

        return response()->json($channelList, 200);
    }

    public function getChannelDetailsFromID(getChannelDetailsFromID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->channels->listChannels('id,snippet,statistics,topicDetails,contentDetails', ['id' => $request->id]);
        return response()->json($result, 200);
    }

    public function getVideoListFromChannelID(GetVideoListFromChannelID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->search->listSearch(
            'id',
            [
                'channelId' => $request->id,
                'maxResults' => 12,
                'type' => 'video',
                'order' => 'date',
            ]
        );

        $ids = "";
        foreach ($result as $value) {
            if (empty($value->id->videoId)) {
                continue;
            }
            $ids .= $value->id->videoId . ",";
        }
        $ids = rtrim($ids, ',');

        $videoList = $service->videos->listVideos(
            'contentDetails,id,liveStreamingDetails,localizations,player,recordingDetails,snippet,statistics,status,topicDetails',
            [
                'id' => $ids
            ]
        );

        return response()->json($videoList, 200);
    }

    public function getVideoDetailsFromVideoID(GetVideoDetailsFromVideoID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $videoDetails = $service->videos->listVideos('contentDetails,id,liveStreamingDetails,localizations,player,recordingDetails,snippet,statistics,status,topicDetails', ['id' => $request->id]);
        return response()->json($videoDetails, 200);
    }

    public function getCommentThreadFromVideoID(GetCommentThreadFromVideoID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $commentThread = $service->commentThreads->listCommentThreads('id,replies,snippet', ['videoId' => $request->id, 'maxResults' => 30]);
        return response()->json($commentThread, 200);
    }
}

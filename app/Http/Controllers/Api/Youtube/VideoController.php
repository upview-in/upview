<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Video\GetVideoDetailsFromVideoID;
use App\Http\Requests\Api\Youtube\Video\GetVideoListFromChannelID;
use App\Http\Requests\Api\Youtube\Video\GetVideoListFromName;

class VideoController extends Controller
{
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

    public function getVideoListFromName(GetVideoListFromName $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->search->listSearch(
            'id',
            [
                'q' => $request->videoName,
                'type' => 'video',
                'maxResults' => 2,
            ]
        );

        $videoList = collect();
        foreach ($result as $value) {
            $videoList->push($service->videos->listVideos('id,snippet,statistics', ['id' => $value->id->videoId]));
        }

        return response()->json($videoList, 200);
    }

    public function getVideoDetailsFromVideoID(GetVideoDetailsFromVideoID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $videoDetails = $service->videos->listVideos('contentDetails,id,liveStreamingDetails,localizations,player,recordingDetails,snippet,statistics,status,topicDetails', ['id' => $request->id]);
        return response()->json($videoDetails, 200);
    }
}

<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Channel\GetChannelDetailsFromID;
use App\Http\Requests\Api\Youtube\Channel\GetChannelListFromName;

class ChannelController extends Controller
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

    public function getChannelDetailsFromID(GetChannelDetailsFromID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->channels->listChannels('id,snippet,statistics,topicDetails,contentDetails', ['id' => $request->id]);
        return response()->json($result, 200);
    }
}

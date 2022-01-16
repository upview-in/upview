<?php

namespace App\Http\Controllers\Api\YouTube;

use App\Helper\Functions;
use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\YouTube\Video\GetVideoAnalytics;
use App\Http\Requests\Api\YouTube\Video\GetVideoDetailsFromVideoID;
use App\Http\Requests\Api\YouTube\Video\GetVideoListFromChannelID;
use App\Http\Requests\Api\YouTube\Video\GetVideoListFromName;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideoListFromChannelID(GetVideoListFromChannelID $request)
    {
        if ($request->has(['pageToken', 'loadMore']) && empty($request->pageToken) && $request->loadMore == 'true') {
            return response()->json([], 200);
        }

        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $result = $service->search->listSearch(
            'id',
            [
                'channelId' => $request->id,
                'type' => 'video',
                'order' => 'date',
                'maxResults' => $request->maxResults ?? 8,
                'pageToken' => $request->pageToken,
            ]
        );

        $ids = [];
        foreach ($result as $value) {
            if (empty($value->id->videoId)) {
                continue;
            }
            $ids[] = $value->id->videoId;
        }
        $ids = implode(',', $ids);
        $videoList = $service->videos->listVideos('contentDetails,id,liveStreamingDetails,localizations,player,recordingDetails,snippet,statistics,status,topicDetails', ['id' => $ids]);

        $videoList->setPrevPageToken($result->getPrevPageToken());
        $videoList->setNextPageToken($result->getNextPageToken());
        $videoList->setPageInfo($result->getPageInfo());

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
                'maxResults' => $request->maxResults ?? 2,
            ]
        );

        $ids = [];
        foreach ($result as $value) {
            if (empty($value->id->videoId)) {
                continue;
            }
            $ids[] = $value->id->videoId;
        }
        $ids = implode(',', $ids);

        $videoList = $service->videos->listVideos('id,snippet,statistics', ['id' => $ids]);

        return response()->json($videoList, 200);
    }

    public function getVideoDetailsFromVideoID(GetVideoDetailsFromVideoID $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $videoDetails = $service->videos->listVideos('contentDetails,id,liveStreamingDetails,localizations,player,recordingDetails,snippet,statistics,status,topicDetails', ['id' => $request->id]);

        return response()->json($videoDetails, 200);
    }

    public function getTrendingVideos()
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeService();
        $videoList = $service->videos->listVideos(
            'id,snippet,contentDetails,liveStreamingDetails,localizations,player,recordingDetails,statistics,status,topicDetails',
            [
                'chart' => 'mostPopular',
                'maxResults' => '10',
                'regionCode' => Functions::getUserCountryCode(),
            ]
        );

        return response()->json($videoList, 200);
    }

    public function getVideoAnalytics(GetVideoAnalytics $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => $request->dimensions ?? 'day',
            'metrics' => 'estimatedMinutesWatched,views,averageViewDuration,likes,comments,shares,subscribersGained,subscribersLost',
            // 'sort' => 'day',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoDemoGraphicsAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'ageGroup,gender',
            'sort' => 'gender,ageGroup',
            'metrics' => 'viewerPercentage',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoDeviceWiseAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'deviceType',
            'metrics' => 'views',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoOsWiseAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'operatingSystem',
            'metrics' => 'views',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoTrafficSourceAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'insightTrafficSourceType',
            'metrics' => 'views,estimatedMinutesWatched',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoSocialMediaTrafficSourceAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'sharingService',
            'metrics' => 'shares',
            'sort' => '-shares',
            'filters' => 'video==' . $request->video_id . ';' . ($request->filters ?? ''),
        ]);

        return response()->json($analytics, 200);
    }

    public function getVideoGeographicStatisticsAnalytics(Request $request)
    {
        $yt = new YoutubeHelper();
        $service = $yt->getYoutubeAnalyticsService();
        $analytics = $service->reports->query([
            'ids' => 'channel==MINE',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dimensions' => 'country',
            'metrics' => 'views,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,subscribersGained',
            'sort' => '-estimatedMinutesWatched',
        ]);

        return response()->json($analytics, 200);
    }
}

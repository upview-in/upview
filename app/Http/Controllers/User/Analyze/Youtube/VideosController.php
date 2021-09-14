<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Helper\Functions;
use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Youtube\VideoController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Video\GetVideoAnalytics;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function videos(Request $request)
    {
        if (!count(TokenHelper::getAuthToken_YT())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }

        if ($request->ajax() && $request->has('part')) {
            switch ($request->part) {
                case 'Analytics':
                    if ($request->has(['video_id', 'startDate', 'endDate', 'dimensions', 'sort', 'filters'])) {
                        $data = [];


                        $VideoAnalyticsResponse = app(VideoController::class)->getVideoAnalytics(new GetVideoAnalytics($request->all(['video_id', 'startDate', 'endDate', 'dimensions', 'sort', 'filters'])))->getData();

                        $SubsciberGained = 0;
                        $Views = 0;
                        $AvgViewDuration = 0;

                        $Likes = 0;
                        $DisLikes = 0;
                        $Shares = 0;
                        $Comments = 0;
                        $EstMinWatched = 0;

                        $indexSubscribersGained = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'subscribersGained');
                        $indexViews = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'views');
                        $indexAvgViewDuration = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'averageViewDuration');

                        $indexDates = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'day');
                        $indexLikes = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'likes');
                        $indexDisLikes = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'dislikes');
                        $indexShares = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'shares');
                        $indexComments = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'comments');
                        $indexEstMinWatched = Functions::getIndexFromHeaderName($VideoAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

                        $OverviewStatisticsChartData = [];
                        $OverviewStatisticsChartData[] = ['Date', 'Subsciber', 'Views', 'Likes', 'Dislikes', 'Shares', 'Comments', 'Est. Min. Watched', 'Avg. View Duration'];

                        foreach ($VideoAnalyticsResponse->rows as $key => $value) {
                            $SubsciberGained += $value[$indexSubscribersGained];
                            $Views += $value[$indexViews];
                            $AvgViewDuration += $value[$indexAvgViewDuration];

                            $OverviewStatisticsChartData[] = [$value[$indexDates], $value[$indexSubscribersGained], $value[$indexViews], $value[$indexLikes], $value[$indexDisLikes], $value[$indexShares], $value[$indexComments], $value[$indexEstMinWatched], $value[$indexAvgViewDuration]];

                            $Likes += $value[$indexLikes];
                            $DisLikes += $value[$indexDisLikes];
                            $Shares += $value[$indexShares];
                            $Comments += $value[$indexComments];
                            $EstMinWatched += $value[$indexEstMinWatched];
                        }

                        $data["OverviewStatistics"]["Likes"] = $Likes;
                        $data["OverviewStatistics"]["DisLikes"] = $DisLikes;
                        $data["OverviewStatistics"]["Shares"] = $Shares;
                        $data["OverviewStatistics"]["Comments"] = $Comments;
                        $data["OverviewStatistics"]["EstMinWatched"] = $EstMinWatched;
                        $data["OverviewStatistics"]["ChartData"] = $OverviewStatisticsChartData;



                        $ChannelDemoGraphicsAnalyticsResponse = app(VideoController::class)->getVideoDemoGraphicsAnalytics($request)->getData();

                        $indexAgeGroup = Functions::getIndexFromHeaderName($ChannelDemoGraphicsAnalyticsResponse->columnHeaders, 'ageGroup');
                        $indexGender = Functions::getIndexFromHeaderName($ChannelDemoGraphicsAnalyticsResponse->columnHeaders, 'gender');
                        $indexViewerPercentage = Functions::getIndexFromHeaderName($ChannelDemoGraphicsAnalyticsResponse->columnHeaders, 'viewerPercentage');

                        $DemoGraphicsChartData = [];
                        $DemoGraphicsChartData[] = ['AgeGroup', 'Male', 'Female'];

                        foreach (collect($ChannelDemoGraphicsAnalyticsResponse->rows)->groupBy($indexAgeGroup) as $key => $value) {
                            $tempArr = [];
                            $tempArr[0] = $key;

                            // Set default 0
                            $tempArr[1] = 0;
                            $tempArr[2] = 0;

                            foreach ($value as $___) {
                                if ($___[$indexGender] == "male") {
                                    $tempArr[1] = $___[$indexViewerPercentage];
                                } else {
                                    $tempArr[2] = $___[$indexViewerPercentage];
                                }
                            }

                            $DemoGraphicsChartData[] = $tempArr;
                        }

                        $data["Demographics"]["ChartData"] = $DemoGraphicsChartData;



                        $DeviceWiseAnalyticsResponse = app(VideoController::class)->getVideoDeviceWiseAnalytics($request)->getData();

                        $indexDeviceType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'deviceType');
                        $indexDeviceWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

                        $DeviceWiseChartData = [];
                        $DeviceWiseChartData[] = ['Device Type', 'Views'];
                        $TopDevice = [];
                        $TopDevice["Views"] = 0;
                        $TopDevice["Device"] = "";

                        foreach ($DeviceWiseAnalyticsResponse->rows as $key => $value) {
                            $DeviceWiseChartData[] = [Functions::ConvertToRegularString($value[$indexDeviceType]), $value[$indexDeviceWiseViews]];
                            if ($value[$indexDeviceWiseViews] > $TopDevice["Views"]) {
                                $TopDevice["Views"] = $value[$indexDeviceWiseViews];
                                $TopDevice["Device"] = Functions::ConvertToRegularString($value[$indexDeviceType]);
                            }
                        }

                        $data["DeviceWise"]["ChartData"] = $DeviceWiseChartData;



                        $OsWiseAnalyticsResponse = app(VideoController::class)->getVideoOsWiseAnalytics($request)->getData();

                        $indexOsType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'operatingSystem');
                        $indexOsWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

                        $OsWiseChartData = [];
                        $OsWiseChartData[] = ['OS', 'Views'];
                        $TopPlatform = [];
                        $TopPlatform["Views"] = 0;
                        $TopPlatform["Platform"] = "";

                        foreach ($OsWiseAnalyticsResponse->rows as $key => $value) {
                            $OsWiseChartData[] = [Functions::ConvertToRegularString($value[$indexOsType]), $value[$indexOsWiseViews]];
                            if ($value[$indexOsWiseViews] > $TopPlatform["Views"]) {
                                $TopPlatform["Views"] = $value[$indexOsWiseViews];
                                $TopPlatform["Platform"] = Functions::ConvertToRegularString($value[$indexOsType]);
                            }
                        }

                        $data["OsWise"]["ChartData"] = $OsWiseChartData;



                        $TrafficSourceAnalyticsResponse = app(VideoController::class)->getVideoTrafficSourceAnalytics($request)->getData();

                        $indexTrafficSourceInsightTrafficSourceType = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'insightTrafficSourceType');
                        $indexTrafficSourceViews = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'views');
                        $indexTrafficSourceEstimatedMinutesWatched = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

                        $TrafficSourceChartData = [];
                        $TrafficSourceChartData[] = ['Traffic Source Type', 'Views', 'Est. Min. Watched'];
                        $TrafficSource = [];
                        $TrafficSource["Views"] = 0;
                        $TrafficSource["Source"] = "";

                        foreach ($TrafficSourceAnalyticsResponse->rows as $key => $value) {
                            $TrafficSourceChartData[] = [Functions::ConvertToRegularString($value[$indexTrafficSourceInsightTrafficSourceType]), $value[$indexTrafficSourceViews], $value[$indexTrafficSourceEstimatedMinutesWatched]];
                            if ($value[$indexTrafficSourceViews] > $TrafficSource["Views"]) {
                                $TrafficSource["Views"] = $value[$indexTrafficSourceViews];
                                $TrafficSource["Source"] = Functions::ConvertToRegularString($value[$indexTrafficSourceInsightTrafficSourceType]);
                            }
                        }

                        $data["TrafficSource"]["ChartData"] = $TrafficSourceChartData;



                        $SocialMediaTrafficSourceAnalyticsResponse = app(VideoController::class)->getVideoSocialMediaTrafficSourceAnalytics($request)->getData();

                        $indexSocialMediaTrafficSourceType = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'sharingService');
                        $indexSocialMediaTrafficSourceShares = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'shares');

                        $SocialMediaTrafficSourceChartData = [];
                        $SocialMediaTrafficSourceChartData[] = ['Source', 'Shares'];
                        $SocialMediaTrafficSource = [];
                        $SocialMediaTrafficSource["Shares"] = 0;
                        $SocialMediaTrafficSource["Source"] = "";

                        foreach ($SocialMediaTrafficSourceAnalyticsResponse->rows as $key => $value) {
                            $SocialMediaTrafficSourceChartData[] = [Functions::ConvertToRegularString($value[$indexSocialMediaTrafficSourceType]), $value[$indexSocialMediaTrafficSourceShares]];

                            if ($value[$indexTrafficSourceViews] > $SocialMediaTrafficSource["Shares"]) {
                                $SocialMediaTrafficSource["Shares"] = $value[$indexSocialMediaTrafficSourceShares];
                                $SocialMediaTrafficSource["Source"] = Functions::ConvertToRegularString($value[$indexSocialMediaTrafficSourceType]);
                            }
                        }

                        $data["SocialMediaTrafficSource"]["ChartData"] = $SocialMediaTrafficSourceChartData;



                        $GeographicStatisticsAnalyticsResponse = app(VideoController::class)->getVideoGeographicStatisticsAnalytics($request)->getData();

                        $indexGeographicStatisticsCountry = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'country');
                        $indexGeographicStatisticsViews = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'views');
                        $indexGeographicStatisticsEstimatedMinutesWatched = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');
                        $indexGeographicStatisticsAverageViewDuration = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'averageViewDuration');
                        $indexGeographicStatisticsAverageViewPercentage = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'averageViewPercentage');
                        $indexGeographicStatisticsSubscribersGained = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'subscribersGained');

                        $GeographicStatisticsChartData = [];
                        // $GeographicStatisticsChartData[] = ["Country", "Views", "Est. Min. Watched", "Avg. View Duration", "Avg. View Percentage", "Subscribers Gained"];
                        $GeographicStatisticsChartData[] = [
                            "Country",
                            "Views",
                            [
                                "role" => "tooltip",
                                "type" => "string",
                                "p" => [
                                    "html" => true
                                ]
                            ]
                        ];
                        $TopCountry = [];
                        $TopCountry["Views"] = 0;
                        $TopCountry["Country"] = "";

                        foreach ($GeographicStatisticsAnalyticsResponse->rows as $key => $value) {
                            // $GeographicStatisticsChartData[] = [$value[$indexGeographicStatisticsCountry], $value[$indexGeographicStatisticsViews], $value[$indexGeographicStatisticsEstimatedMinutesWatched], $value[$indexGeographicStatisticsAverageViewDuration], $value[$indexGeographicStatisticsAverageViewPercentage], $value[$indexGeographicStatisticsSubscribersGained]];
                            $GeographicStatisticsChartData[] = [$value[$indexGeographicStatisticsCountry], $value[$indexGeographicStatisticsViews], "<strong>Views:</strong> " . $value[$indexGeographicStatisticsViews] . "<br><strong>Est. Min. Watched:</strong> " . $value[$indexGeographicStatisticsEstimatedMinutesWatched] . "<br><strong>Avg. View Duration:</strong> " . $value[$indexGeographicStatisticsAverageViewDuration] . "<br><strong>Avg. View Percentage:</strong> " . $value[$indexGeographicStatisticsAverageViewPercentage] . "%<br><strong>Subscribers Gained:</strong> " . $value[$indexGeographicStatisticsSubscribersGained]];
                            if ($value[$indexGeographicStatisticsViews] > $TopCountry["Views"]) {
                                $TopCountry["Views"] = $value[$indexGeographicStatisticsViews];
                                $TopCountry["Country"] = $value[$indexGeographicStatisticsCountry];
                            }
                        }

                        $data["GeographicStatistics"]["ChartData"] = $GeographicStatisticsChartData;

                        return response()->json(collect($data));
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    }
                    break;

                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.youtube.videos');
    }
}

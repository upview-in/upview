<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Helper\Functions;
use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Youtube\ChannelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Channel\GetMineChannelAnalytics;
use App\Http\Requests\Api\Youtube\Channel\GetMineChannelList;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function overview(Request $request)
    {
        if (!count(TokenHelper::getAuthToken_YT())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }

        if ($request->ajax() && $request->has('part')) {
            switch ($request->part) {
                case 'Analytics':
                    if ($request->has(['startDate', 'endDate', 'dimensions', 'sort', 'filters'])) {
                        $data = [];


                        $ChannelAnalyticsResponse = app(ChannelController::class)->getMineChannelAnalytics(new GetMineChannelAnalytics($request->all(['startDate', 'endDate', 'dimensions', 'sort', 'filters'])))->getData();

                        $SubsciberGained = 0;
                        $Views = 0;
                        $AvgViewDuration = 0;

                        $Likes = 0;
                        $DisLikes = 0;
                        $Shares = 0;
                        $Comments = 0;
                        $EstMinWatched = 0;

                        $indexSubscribersGained = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'subscribersGained');
                        $indexViews = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'views');
                        $indexAvgViewDuration = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'averageViewDuration');

                        $indexDates = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'day');
                        $indexLikes = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'likes');
                        $indexDisLikes = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'dislikes');
                        $indexShares = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'shares');
                        $indexComments = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'comments');
                        $indexEstMinWatched = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

                        $OverviewStatisticsChartData = [];
                        $OverviewStatisticsChartData[] = ['Date', 'Subsciber', 'Views', 'Likes', 'Dislikes', 'Shares', 'Comments', 'Est. Min. Watched', 'Avg. View Duration'];

                        foreach ($ChannelAnalyticsResponse->rows as $key => $value) {
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

                        $data["Heighlights"]["SubsciberGained"] = $SubsciberGained;
                        $data["Heighlights"]["Views"] = $Views;
                        $data["Heighlights"]["AvgViewDuration"] = $AvgViewDuration;

                        $data["OverviewStatistics"]["Likes"] = $Likes;
                        $data["OverviewStatistics"]["DisLikes"] = $DisLikes;
                        $data["OverviewStatistics"]["Shares"] = $Shares;
                        $data["OverviewStatistics"]["Comments"] = $Comments;
                        $data["OverviewStatistics"]["EstMinWatched"] = $EstMinWatched;
                        $data["OverviewStatistics"]["ChartData"] = $OverviewStatisticsChartData;



                        $ChannelDemoGraphicsAnalyticsResponse = app(ChannelController::class)->getMineChannelDemoGraphicsAnalytics($request)->getData();

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

                        if (count($DemoGraphicsChartData) <= 1) {
                            $DemoGraphicsChartData[] = ["age18-24", 0, 0];
                        }

                        $data["Demographics"]["ChartData"] = $DemoGraphicsChartData;



                        $DeviceWiseAnalyticsResponse = app(ChannelController::class)->getMineChannelDeviceWiseAnalytics($request)->getData();

                        $indexDeviceType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'deviceType');
                        $indexDeviceWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

                        $DeviceWiseChartData = [];
                        $DeviceWiseChartData[] = ['Device Type', 'Views'];

                        foreach ($DeviceWiseAnalyticsResponse->rows as $key => $value) {
                            $DeviceWiseChartData[] = [Functions::ConvertToRegularString($value[$indexDeviceType]), $value[$indexDeviceWiseViews]];
                        }

                        if (count($DeviceWiseChartData) <= 1) {
                            $DeviceWiseChartData[] = ["Mobile", 0];
                        }
                        $data["DeviceWise"]["ChartData"] = $DeviceWiseChartData;



                        $OsWiseAnalyticsResponse = app(ChannelController::class)->getMineChannelOsWiseAnalytics($request)->getData();

                        $indexOsType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'operatingSystem');
                        $indexOsWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

                        $OsWiseChartData = [];
                        $OsWiseChartData[] = ['OS', 'Views'];

                        foreach ($OsWiseAnalyticsResponse->rows as $key => $value) {
                            $OsWiseChartData[] = [Functions::ConvertToRegularString($value[$indexOsType]), $value[$indexOsWiseViews]];
                        }
                        if (count($OsWiseChartData) <= 1) {
                            $OsWiseChartData[] = ["Android", 0];
                        }
                        $data["OsWise"]["ChartData"] = $OsWiseChartData;



                        $TrafficSourceAnalyticsResponse = app(ChannelController::class)->getMineChannelTrafficSourceAnalytics($request)->getData();

                        $indexTrafficSourceInsightTrafficSourceType = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'insightTrafficSourceType');
                        $indexTrafficSourceViews = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'views');
                        $indexTrafficSourceEstimatedMinutesWatched = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

                        $TrafficSourceChartData = [];
                        $TrafficSourceChartData[] = ['Traffic Source Type', 'Views', 'Est. Min. Watched'];

                        foreach ($TrafficSourceAnalyticsResponse->rows as $key => $value) {
                            $TrafficSourceChartData[] = [Functions::ConvertToRegularString($value[$indexTrafficSourceInsightTrafficSourceType]), $value[$indexTrafficSourceViews], $value[$indexTrafficSourceEstimatedMinutesWatched]];
                        }

                        if (count($TrafficSourceChartData) <= 1) {
                            $TrafficSourceChartData[] = ["Other", 0, 0];
                        }
                        $data["TrafficSource"]["ChartData"] = $TrafficSourceChartData;



                        $SocialMediaTrafficSourceAnalyticsResponse = app(ChannelController::class)->getMineChannelSocialMediaTrafficSourceAnalytics($request)->getData();

                        $indexSocialMediaTrafficSourceType = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'sharingService');
                        $indexSocialMediaTrafficSourceShares = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'shares');

                        $SocialMediaTrafficSourceChartData = [];
                        $SocialMediaTrafficSourceChartData[] = ['Source', 'Shares'];

                        foreach ($SocialMediaTrafficSourceAnalyticsResponse->rows as $key => $value) {
                            $SocialMediaTrafficSourceChartData[] = [Functions::ConvertToRegularString($value[$indexSocialMediaTrafficSourceType]), $value[$indexSocialMediaTrafficSourceShares]];
                        }

                        if (count($SocialMediaTrafficSourceChartData) <= 1) {
                            $SocialMediaTrafficSourceChartData[] = ["Whatsapp", 0];
                        }
                        $data["SocialMediaTrafficSource"]["ChartData"] = $SocialMediaTrafficSourceChartData;

                        return response()->json(collect($data));
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    }
                    break;

                case 'ChannelDetails':
                    $data = [];
                    $response = app(ChannelController::class)->getMineChannelList(new GetMineChannelList($request->all()))->getData();

                    $item = $response->items[0];
                    $snippet = $item->snippet;
                    $statistics = $item->statistics;
                    $topicDetails = $item->topicDetails ?? null;

                    $ProfileURL = $snippet->thumbnails->medium->url;
                    $PublishedDate = $snippet->publishedAt;
                    $ChannelName = $snippet->title;
                    $ChannelCountry = $snippet->country;
                    $ChannelViews = $statistics->viewCount;
                    $ChannelSubscriber = $statistics->subscriberCount;
                    $ChannelVideos = $statistics->videoCount;
                    $ChannelCategory = "";

                    if (!is_null($topicDetails)) {
                        foreach ($topicDetails->topicCategories as $key => $value) {
                            $ChannelCategory .= "<a href='" . $value . "' target='_blank'>" . str_replace(['-', '_', '_', ''], ' ', str_replace('https://en.wikipedia.org/wiki/', '', $value)) . "</a><br />";
                        }
                    }

                    $data["ChannelDetails"]["profileURL"] = $ProfileURL;
                    $data["ChannelDetails"]["publishedAt"] = $PublishedDate;
                    $data["ChannelDetails"]["channelName"] = $ChannelName;
                    $data["ChannelDetails"]["country"] = $ChannelCountry;
                    $data["ChannelDetails"]["viewCount"] = $ChannelViews;
                    $data["ChannelDetails"]["subscriberCount"] = $ChannelSubscriber;
                    $data["ChannelDetails"]["videoCount"] = $ChannelVideos;
                    $data["ChannelDetails"]["channelCategory"] = !empty($ChannelCategory) ? $ChannelCategory : 'N/A';

                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.youtube.overview');
    }
}

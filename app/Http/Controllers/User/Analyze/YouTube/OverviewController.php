<?php

namespace App\Http\Controllers\User\Analyze\YouTube;

use App\Helper\Functions;
use App\Helper\TokenHelper;
use App\Http\Controllers\Api\YouTube\ChannelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\YouTube\Channel\GetMineChannelAnalytics;
use App\Http\Requests\Api\YouTube\Channel\GetMineChannelList;
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
                    $ret = $this->getAnalytics($request);
                    break;

                case 'ChannelDetails':
                    $ret = $this->getChannelDetails($request);
                    break;

                default:
                    $ret = response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }

            return $ret;
        }

        return view('user.analyze.youtube.overview');
    }

    private function getChannelDetails(Request $request)
    {
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
        $ChannelCategory = '';

        if (!is_null($topicDetails)) {
            foreach ($topicDetails->topicCategories as $topicCategorie) {
                $ChannelCategory .= "<a href='" . $topicCategorie . "' target='_blank'>" . str_replace(['-', '_', '_', ''], ' ', str_replace('https://en.wikipedia.org/wiki/', '', $topicCategorie)) . '</a><br />';
            }
        }

        $data['ChannelDetails']['profileURL'] = $ProfileURL;
        $data['ChannelDetails']['publishedAt'] = $PublishedDate;
        $data['ChannelDetails']['channelName'] = $ChannelName;
        $data['ChannelDetails']['country'] = $ChannelCountry;
        $data['ChannelDetails']['viewCount'] = $ChannelViews;
        $data['ChannelDetails']['subscriberCount'] = $ChannelSubscriber;
        $data['ChannelDetails']['videoCount'] = $ChannelVideos;
        $data['ChannelDetails']['channelCategory'] = !empty($ChannelCategory) ? $ChannelCategory : 'N/A';

        return response()->json(collect($data));
    }

    private function getAnalytics(Request $request)
    {
        if ($request->has(['startDate', 'endDate', 'dimensions', 'sort', 'filters'])) {
            $data = [];
            $SubsciberGained = $Views = $AvgViewDuration = $Likes = $Shares = $Comments = $EstMinWatched = 0;

            $ChannelAnalyticsResponse = app(ChannelController::class)->getMineChannelAnalytics(new GetMineChannelAnalytics($request->all(['startDate', 'endDate', 'dimensions', 'sort', 'filters'])))->getData();

            $indexSubscribersGained = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'subscribersGained');
            $indexViews = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'views');
            $indexAvgViewDuration = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'averageViewDuration');

            $indexDates = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'day');
            $indexLikes = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'likes');
            $indexShares = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'shares');
            $indexComments = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'comments');
            $indexEstMinWatched = Functions::getIndexFromHeaderName($ChannelAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

            $OverviewStatisticsChartData = [];
            $OverviewStatisticsChartData[] = ['Date', 'Subsciber', 'Views', 'Likes', 'Shares', 'Comments', 'Est. Min. Watched', 'Avg. View Duration'];

            foreach ($ChannelAnalyticsResponse->rows as $key => $value) {
                $SubsciberGained += $value[$indexSubscribersGained];
                $Views += $value[$indexViews];
                $AvgViewDuration += $value[$indexAvgViewDuration];

                $OverviewStatisticsChartData[] = [$value[$indexDates], $value[$indexSubscribersGained], $value[$indexViews], $value[$indexLikes], $value[$indexShares], $value[$indexComments], $value[$indexEstMinWatched], $value[$indexAvgViewDuration]];

                $Likes += $value[$indexLikes];
                $Shares += $value[$indexShares];
                $Comments += $value[$indexComments];
                $EstMinWatched += $value[$indexEstMinWatched];
            }

            $data['OverviewStatistics']['Likes'] = $Likes;
            $data['OverviewStatistics']['Shares'] = $Shares;
            $data['OverviewStatistics']['Comments'] = $Comments;
            $data['OverviewStatistics']['EstMinWatched'] = $EstMinWatched;
            $data['OverviewStatistics']['ChartData'] = $OverviewStatisticsChartData;

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
                $tempArr[1] = $tempArr[2] = 0;

                foreach ($value as $___) {
                    if ($___[$indexGender] == 'male') {
                        $tempArr[1] = $___[$indexViewerPercentage];
                    } else {
                        $tempArr[2] = $___[$indexViewerPercentage];
                    }
                }

                $DemoGraphicsChartData[] = $tempArr;
            }

            $data['Demographics']['ChartData'] = $DemoGraphicsChartData;

            $DeviceWiseAnalyticsResponse = app(ChannelController::class)->getMineChannelDeviceWiseAnalytics($request)->getData();

            $indexDeviceType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'deviceType');
            $indexDeviceWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

            $DeviceWiseChartData = [];
            $DeviceWiseChartData[] = ['Device Type', 'Views'];
            $TopDevice = [];
            $TopDevice['Views'] = 0;
            $TopDevice['Device'] = '';

            foreach ($DeviceWiseAnalyticsResponse->rows as $key => $value) {
                $DeviceWiseChartData[] = [Functions::ConvertToRegularString($value[$indexDeviceType]), $value[$indexDeviceWiseViews]];
                if ($value[$indexDeviceWiseViews] > $TopDevice['Views']) {
                    $TopDevice['Views'] = $value[$indexDeviceWiseViews];
                    $TopDevice['Device'] = Functions::ConvertToRegularString($value[$indexDeviceType]);
                }
            }

            $data['DeviceWise']['ChartData'] = $DeviceWiseChartData;

            $OsWiseAnalyticsResponse = app(ChannelController::class)->getMineChannelOsWiseAnalytics($request)->getData();

            $indexOsType = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'operatingSystem');
            $indexOsWiseViews = Functions::getIndexFromHeaderName($DeviceWiseAnalyticsResponse->columnHeaders, 'views');

            $OsWiseChartData = [];
            $OsWiseChartData[] = ['OS', 'Views'];
            $TopPlatform = [];
            $TopPlatform['Views'] = 0;
            $TopPlatform['Platform'] = '';

            foreach ($OsWiseAnalyticsResponse->rows as $key => $value) {
                $OsWiseChartData[] = [Functions::ConvertToRegularString($value[$indexOsType]), $value[$indexOsWiseViews]];
                if ($value[$indexOsWiseViews] > $TopPlatform['Views']) {
                    $TopPlatform['Views'] = $value[$indexOsWiseViews];
                    $TopPlatform['Platform'] = Functions::ConvertToRegularString($value[$indexOsType]);
                }
            }
            $data['OsWise']['ChartData'] = $OsWiseChartData;

            $TrafficSourceAnalyticsResponse = app(ChannelController::class)->getMineChannelTrafficSourceAnalytics($request)->getData();

            $indexTrafficSourceInsightTrafficSourceType = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'insightTrafficSourceType');
            $indexTrafficSourceViews = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'views');
            $indexTrafficSourceEstimatedMinutesWatched = Functions::getIndexFromHeaderName($TrafficSourceAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');

            $TrafficSourceChartData = $TrafficSource = [];
            $TrafficSourceChartData[] = ['Traffic Source Type', 'Views', 'Est. Min. Watched'];
            $TrafficSource['Views'] = 0;
            $TrafficSource['Source'] = '';

            foreach ($TrafficSourceAnalyticsResponse->rows as $key => $value) {
                $SourceInsightTrafficSourceType = Functions::ConvertToRegularString($value[$indexTrafficSourceInsightTrafficSourceType]);
                $splittedTrafficSource = explode(' ', $SourceInsightTrafficSourceType);
                if (!empty($splittedTrafficSource) && $splittedTrafficSource[0] == 'Yt') {
                    $splittedTrafficSource[0] = 'YouTube';
                    $SourceInsightTrafficSourceType = implode(' ', $splittedTrafficSource);
                }

                $TrafficSourceChartData[] = [$SourceInsightTrafficSourceType, $value[$indexTrafficSourceViews], $value[$indexTrafficSourceEstimatedMinutesWatched]];
                if ($value[$indexTrafficSourceViews] > $TrafficSource['Views']) {
                    $TrafficSource['Views'] = $value[$indexTrafficSourceViews];
                    $TrafficSource['Source'] = $SourceInsightTrafficSourceType;
                }
            }

            $data['TrafficSource']['ChartData'] = $TrafficSourceChartData;

            $SocialMediaTrafficSourceAnalyticsResponse = app(ChannelController::class)->getMineChannelSocialMediaTrafficSourceAnalytics($request)->getData();

            $indexSocialMediaTrafficSourceType = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'sharingService');
            $indexSocialMediaTrafficSourceShares = Functions::getIndexFromHeaderName($SocialMediaTrafficSourceAnalyticsResponse->columnHeaders, 'shares');

            $SocialMediaTrafficSourceChartData = [];
            $SocialMediaTrafficSourceChartData[] = ['Source', 'Shares'];
            $SocialMediaTrafficSource = [];
            $SocialMediaTrafficSource['Shares'] = 0;
            $SocialMediaTrafficSource['Source'] = '';

            foreach ($SocialMediaTrafficSourceAnalyticsResponse->rows as $key => $value) {
                $SocialMediaTrafficSourceChartData[] = [Functions::ConvertToRegularString($value[$indexSocialMediaTrafficSourceType]), $value[$indexSocialMediaTrafficSourceShares]];

                if ($value[$indexTrafficSourceViews] > $SocialMediaTrafficSource['Shares']) {
                    $SocialMediaTrafficSource['Shares'] = $value[$indexSocialMediaTrafficSourceShares];
                    $SocialMediaTrafficSource['Source'] = Functions::ConvertToRegularString($value[$indexSocialMediaTrafficSourceType]);
                }
            }

            $data['SocialMediaTrafficSource']['ChartData'] = $SocialMediaTrafficSourceChartData;

            $GeographicStatisticsAnalyticsResponse = app(ChannelController::class)->getMineChannelGeographicStatisticsAnalytics($request)->getData();

            $indexGeographicStatisticsCountry = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'country');
            $indexGeographicStatisticsViews = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'views');
            $indexGeographicStatisticsEstimatedMinutesWatched = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'estimatedMinutesWatched');
            $indexGeographicStatisticsAverageViewDuration = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'averageViewDuration');
            $indexGeographicStatisticsAverageViewPercentage = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'averageViewPercentage');
            $indexGeographicStatisticsSubscribersGained = Functions::getIndexFromHeaderName($GeographicStatisticsAnalyticsResponse->columnHeaders, 'subscribersGained');

            $GeographicStatisticsChartData = [];
            $GeographicStatisticsChartData[] = [
                'Country',
                'Views',
                [
                    'role' => 'tooltip',
                    'type' => 'string',
                    'p' => [
                        'html' => true,
                    ],
                ],
            ];
            $TopCountry = ['Views' => 0, 'Country' => ''];

            foreach ($GeographicStatisticsAnalyticsResponse->rows as $key => $value) {
                $GeographicStatisticsChartData[] = [$value[$indexGeographicStatisticsCountry], $value[$indexGeographicStatisticsViews], '<strong>Views:</strong> ' . $value[$indexGeographicStatisticsViews] . '<br><strong>Est. Min. Watched:</strong> ' . $value[$indexGeographicStatisticsEstimatedMinutesWatched] . '<br><strong>Avg. View Duration:</strong> ' . $value[$indexGeographicStatisticsAverageViewDuration] . '<br><strong>Avg. View Percentage:</strong> ' . $value[$indexGeographicStatisticsAverageViewPercentage] . '%<br><strong>Subscribers Gained:</strong> ' . $value[$indexGeographicStatisticsSubscribersGained]];
                if ($value[$indexGeographicStatisticsViews] > $TopCountry['Views']) {
                    $TopCountry['Views'] = $value[$indexGeographicStatisticsViews];
                    $TopCountry['Country'] = $value[$indexGeographicStatisticsCountry];
                }
            }

            $data['GeographicStatistics']['ChartData'] = $GeographicStatisticsChartData;

            $data['Heighlights']['SubsciberGained'] = $SubsciberGained;
            $data['Heighlights']['Views'] = $Views;
            $data['Heighlights']['AvgViewDuration'] = $AvgViewDuration;
            $data['Heighlights']['TopCountry'] = $TopCountry;
            $data['Heighlights']['TopDevice'] = $TopDevice;
            $data['Heighlights']['TopPlatform'] = $TopPlatform;
            $data['Heighlights']['TrafficSource'] = $TrafficSource;
            $data['Heighlights']['SocialMediaTrafficSource'] = $SocialMediaTrafficSource;

            return response()->json(collect($data));
        }

        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
    }
}

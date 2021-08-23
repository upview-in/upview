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
                        $response = app(ChannelController::class)->getMineChannelAnalytics(new GetMineChannelAnalytics($request->all(['startDate', 'endDate', 'dimensions', 'sort', 'filters'])))->getData();

                        $SubsciberGained = 0;
                        $Views = 0;
                        $AvgViewDuration = 0;

                        $Likes = 0;
                        $DisLikes = 0;
                        $Shares = 0;
                        $Comments = 0;
                        $EstMinWatched = 0;

                        $indexSubscribersGained = Functions::getIndexFromHeaderName($response->columnHeaders, 'subscribersGained');
                        $indexViews = Functions::getIndexFromHeaderName($response->columnHeaders, 'views');
                        $indexAvgViewDuration = Functions::getIndexFromHeaderName($response->columnHeaders, 'averageViewDuration');

                        $indexDates = Functions::getIndexFromHeaderName($response->columnHeaders, '');
                        $indexLikes = Functions::getIndexFromHeaderName($response->columnHeaders, 'likes');
                        $indexDisLikes = Functions::getIndexFromHeaderName($response->columnHeaders, 'dislikes');
                        $indexShares = Functions::getIndexFromHeaderName($response->columnHeaders, 'shares');
                        $indexComments = Functions::getIndexFromHeaderName($response->columnHeaders, 'comments');
                        $indexEstMinWatched = Functions::getIndexFromHeaderName($response->columnHeaders, 'estimatedMinutesWatched');

                        $ChartData = [];
                        $ChartData[] = ['Date', 'Likes', 'Dislikes', 'Shares', 'Comments'];

                        foreach ($response->rows as $key => $value) {
                            $ChartData[] = [$value[$indexDates], $value[$indexLikes], $value[$indexDisLikes], $value[$indexShares], $value[$indexComments]];
                            $SubsciberGained += $value[$indexSubscribersGained];
                            $Views += $value[$indexViews];
                            $AvgViewDuration += $value[$indexAvgViewDuration];

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
                        $data["OverviewStatistics"]["ChartData"] = $ChartData;

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

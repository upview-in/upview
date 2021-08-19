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
                        $EstMinWatched = 0;
                        $AvgViewDuration = 0;

                        $indexSubscribersGained = Functions::getIndexFromHeaderName($response->columnHeaders, 'subscribersGained');
                        $indexViews = Functions::getIndexFromHeaderName($response->columnHeaders, 'views');
                        $indexEstMinWatched = Functions::getIndexFromHeaderName($response->columnHeaders, 'estimatedMinutesWatched');
                        $indexAvgViewDuration = Functions::getIndexFromHeaderName($response->columnHeaders, 'averageViewDuration');

                        foreach ($response->rows as $key => $value) {
                            $SubsciberGained += $value[$indexSubscribersGained];
                            $Views += $value[$indexViews];
                            $EstMinWatched += $value[$indexEstMinWatched];
                            $AvgViewDuration += $value[$indexAvgViewDuration];
                        }

                        $data["Heighlights"]["SubsciberGained"] = $SubsciberGained;
                        $data["Heighlights"]["Views"] = $Views;
                        $data["Heighlights"]["EstMinWatched"] = $EstMinWatched;
                        $data["Heighlights"]["AvgViewDuration"] = $AvgViewDuration;

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

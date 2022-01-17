<?php

namespace App\Http\Controllers\User\Measure\MarketResearch;

use App\Http\Controllers\Api\YouTube\VideoController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Measure\MarketResearch\VideoDetailsRequest;
use App\Http\Requests\User\Measure\MarketResearch\VideoIntelligenceIndex;
use Illuminate\Http\Request;

class VideoIntelligence extends Controller
{
    public function index(VideoIntelligenceIndex $request)
    {
        $TrendingVideos = app(VideoController::class)->getTrendingVideos(new Request())->getData();

        return view('user.measure.market_research.video_intelligence', ['TrendingVideos' => $TrendingVideos]);
    }

    public function videoDetails(VideoDetailsRequest $request)
    {
        return view('user.measure.market_research.video_details');
    }
}

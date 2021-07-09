<?php

namespace App\Http\Controllers\User\Measure\MarketResearch;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Measure\MarketResearch\VideoDetailsRequest;
use App\Http\Requests\User\Measure\MarketResearch\videoIntelligenceIndex;

class VideoIntelligence extends Controller
{
    public function index(videoIntelligenceIndex $request)
    {
        return view('user.measure.market_research.video_intelligence');
    }

    public function channelDetails(VideoDetailsRequest $request)
    {
        return view('user.measure.market_research.video_details');
    }
}

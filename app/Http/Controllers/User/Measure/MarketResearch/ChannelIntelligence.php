<?php

namespace App\Http\Controllers\User\Measure\MarketResearch;

use App\Http\Controllers\Api\Youtube\ChannelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Youtube\Channel\GetMineChannelList;
use App\Http\Requests\User\Measure\MarketResearch\ChannelDetailsRequest;
use App\Http\Requests\User\Measure\MarketResearch\ChannelIntelligenceIndex;

class ChannelIntelligence extends Controller
{
    public function index(ChannelIntelligenceIndex $request)
    {
        return view('user.measure.market_research.channel_intelligence');
    }

    public function channelDetails(ChannelDetailsRequest $request)
    {
        return view('user.measure.market_research.channel_details');
    }
}

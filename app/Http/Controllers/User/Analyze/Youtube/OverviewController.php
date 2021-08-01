<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function overview(Request $request)
    {
        // $mineChannels = app(ChannelController::class)->getMineChannelList(new GetMineChannelList())->getData();
        // $mineAnalytics = app(ChannelController::class)->getMineChannelAnalytics(new GetMineChannelAnalytics(), Carbon::now()->subMonth(1)->format('Y-m-d'), Carbon::now()->format('Y-m-d'))->getData();

        // dd($mineChannels, $mineAnalytics);

        return view('user.analyze.youtube.overview');
    }
}

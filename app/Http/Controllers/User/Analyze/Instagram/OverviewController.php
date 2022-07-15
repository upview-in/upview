<?php

namespace App\Http\Controllers\User\Analyze\Instagram;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Instagram\InstagramController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Instagram\Account\GetMineAccountDetails;
use App\Http\Requests\User\Analyze\Instagram\ViewOverviewRequest;

class OverviewController extends Controller
{
    public function overview(ViewOverviewRequest $request)
    {
        if (!count(TokenHelper::getAuthToken_IG())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }

        if ($request->ajax() && $request->has('part')) {
            switch ($request->part) {
                case 'RefreshPages':
                    return response()->json(app(InstagramController::class)->listInstaBusinessAccountsData(), 200);
                    break;
                case 'Analytics':
                        $data = [];
                        $response = app(InstagramController::class)->getMineAccountInsights(new GetMineAccountDetails($request->all(['id'])))->getData();

                        $data['impressions'] = $response->data[0]->values[0]->value;
                        $data['reach'] = $response->data[1]->values[0]->value;
                        // $data['profile_views']['dayBeforeYest'] = $response->data[2]->values[0]->value;
                        // $data['profile_views']['yest'] = $response->data[2]->values[1]->value;

                        $response = app(InstagramController::class)->getMineAccountProfileViews()->getData();
                        $data['profile_views'] = $response->profile_views;

                        $data['chartData'][0] = ['This title', 'Impressions', 'Reach', 'Views'];
                        $data['chartData'][1] = ['Insights', 0, 0, 0];
                        $data['chartData'][2] = ['Insights', $data['impressions'], $data['reach'], $data['profile_views']];
                        $data['status'] = 200;

                        return response()->json(collect($data), 200);
                case 'accountDetails':
                    $data = [];
                    $response = app(InstagramController::class)->getMineAccountInsights(new GetMineAccountDetails($request->all(['id'])))->getData();

                    $data['id'] = $response->id;
                    $data['name'] = $response->name;
                    $data['followers_count'] = $response->followers_count;
                    $data['follows_count'] = $response->follows_count;
                    $data['ig_id'] = $response->ig_id;
                    $data['media_count'] = $response->media_count;
                    $data['profile_picture_url'] = $response->profile_picture_url;
                    $data['username'] = $response->username;

                    $data['is_verified'] = app(InstagramController::class)->getUserVerifiedStatus($response->username);

                    $data['status'] = 200;

                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
            }
        }

        return view('user.analyze.instagram.overview');
    }
}

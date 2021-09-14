<?php

namespace App\Http\Controllers\User\Analyze\Facebook;

use App\Helper\TokenHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\Facebook\FacebookController;

use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;


class FacebookOverviewController extends Controller
{
     public function overview(Request $request)
    {
    
        if (!count(TokenHelper::getAuthToken_FB())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }

        if ($request->ajax() && $request->has('part')) {
            switch ($request->part) {
                case 'Analytics':
                    if ($request->has(['fields'])) {
                        $data = [];               
                        $response = app(FacebookController::class)->getMineAccountInsights(new GetMineAccountDetails($request->all(['fields'])))->getData();
                        $data['impressions']['dayBeforeYest'] = $response->data[0]->values[0]->value;
                        $data['impressions']['yest'] = $response->data[0]->values[1]->value;
                        $data['reach']['dayBeforeYest'] = $response->data[1]->values[0]->value;
                        $data['reach']['yest'] = $response->data[1]->values[1]->value;
                        $data['profile_views']['dayBeforeYest'] = $response->data[2]->values[0]->value;
                        $data['profile_views']['yest'] = $response->data[2]->values[1]->value;

                       return response()->json(collect($data), 200);
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    }
                    break;

                case 'accountDetails':
                    $data = [];
                    $response = app(FacebookController::class)->getMineAccountData(new GetMineAccountDetails($request->all(['fields'])))->getData();

                    $data['chartData'][0] = ["This title lmfao","Friends", "Posts"];
                    
                    $data["id"] = $response->id;
                    $data["name"]= $response->name;
                    $data["birthday"]= $response->birthday;
                    $data["age_range"]= $response->age_range->min;
                    $data["posts"]= $response->posts;
                    $data["friends_count"]= $response->friends->summary->total_count;
                    $data["gender"]= $response->gender;
                    $data["profile_link"]= $response->link;
                    $data["profile_picture"]=$response->picture->data->url;
                    
                    $data["is_verified"] = app(FacebookController::class)->getUserVerifiedStatus($response->name);

                    $data['chartData'][1] = ["Insights",0,0];
                
                    $data['chartData'][2] = ["Insights", $data['friends_count'], count($data['posts']->data)];

                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.facebook.fb_overview');
    }
}

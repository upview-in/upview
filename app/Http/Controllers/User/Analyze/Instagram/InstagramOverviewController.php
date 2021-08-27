<?php

namespace App\Http\Controllers\User\Analyze\Instagram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Functions;
use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Instagram\InstagramController;
use App\Http\Requests\Api\Instagram\Account\GetMineAccountDetails;

class InstagramOverviewController extends Controller
{
    public function overview(Request $request)
    {
    

        if (!count(TokenHelper::getAuthToken_IG())) {
            return redirect()->route('panel.user.account.accounts_manager');
        }

        if ($request->ajax() && $request->has('part')) {
            switch ($request->part) {
                case 'Analytics':
                    if ($request->has(['fields'])) {
                        $data = [];
                        $response = app(InstagramController::class)->getMineAccountInsights(new GetMineAccountDetails($request->all(['fields'])))->getData();
                    
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
                    $response = app(InstagramController::class)->getMineAccountData(new GetMineAccountDetails($request->all(['fields'])))->getData();



                    $data["id"] = $response->id;
                    $data["name"]= $response->name;
                    $data["followers_count"]= $response->followers_count;
                    $data["follows_count"]= $response->follows_count;
                    $data["ig_id"]= $response->ig_id;
                    $data["media_count"]= $response->media_count;
                    $data["profile_picture_url"]= $response->profile_picture_url;
                    $data["username"]= $response->username;

                    $data["is_verified"] = app(InstagramController::class)->getUserVerifiedStatus($response->username);
                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.instagram.ig_overview');
    }

    


}

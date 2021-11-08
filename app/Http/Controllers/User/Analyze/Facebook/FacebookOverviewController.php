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
                case 'RefreshPages':
                    return response()->json((FacebookController::getFacebookPageData()), 200);
                    break;

                case 'Analytics':
                    if ($request->has(['fields'])) {
                        $data = [];
                        $response = app(FacebookController::class)->getMINEAccountInsightsEx(new GetMineAccountDetails($request->all(['fields'])))->getData();

                        $data['chartData'][0] = ["This title lmfao","Impressions", "Reach", "Views"];
                        $data['impressions'] = $response->data[0]->values[0]->value;
                        $data['reach'] = $response->data[1]->values[0]->value;
                        // $data['profile_views']['dayBeforeYest'] = $response->data[2]->values[0]->value;
                        // $data['profile_views']['yest'] = $response->data[2]->values[1]->value;

                        $response =  app(InstagramController::class)->getMineAccountProfileViews()->getData();
                        $data['profile_views'] = $response->profile_views;
                        $data['chartData'][1] = ["Insights",0,0,0];
                        $data['chartData'][2] = ["Insights", $data['impressions'], $data['reach'], $data['profile_views']];
                        $data['status'] = 200;

                       return response()->json(collect($data), 200);
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    }
                    break;


                    case 'PageAnalytics':
                        if ($request->has(['fields'])) {
                            $data = [];
                            $response = app(FacebookController::class)->getFacebookPagesInsightsEx(new GetMineAccountDetails($request->all(['id','fields'])))->getData();
                            //$data['chartData'][0] = ["This title lmfao","Impressions", "Reach", "Views"];

                            $data['name'] = $response->name ??  "N/A";
                            $data['picture'] = $response->picture ?? array('data'=>array('url'=>"{{ asset('images/no-image.jpg') }}"));
                            $data['about'] =  $response->about ??  "N/A";
                            $data['bio'] = $response->bio   ??  "N/A";
                            $data['business'] =  $response->business ??  "N/A";
                            $data['country_pages_likes'] = $response->country_pages_likes ?? "N/A";

                            $data['description'] = $response->description ?? "N/A";
                            $data['engagement'] = $response->engagement ?? "N/A";
                            $data['followers_count'] = $response->followers_count  ?? "N/A";
                            $data['is_published'] =  $response->is_published  ?? false;
                            $response->link  ? $data['link'] = $response->link : $data['link'] = "#";

                            $data['location']['city'] = $response->location->city ?? "";
                            $data['location']['country'] = $response->location->city ?? "";
                            $data['location']['zip'] = $response->location->city ?? "";                            //City, Country, ZIP
                            $data['page_cover'] = $response->page_cover ?? "{{ asset('images/no-image.jpg') }}";
                            $data['fan_count'] = $response->fan_count ??  "N/A";
                            $data['is_community_page'] = $response->is_community_page  ?? false;
                            $data['new_like_count'] = $response->new_like_count ??  "N/A";
                            strcmp($response->verification_status, "not_verified")  ? $data['verification_status'] = true : $data['verification_status'] = false;
                            $data['feed'] = $response->feed ?? null; //Posts[Created Time, Message, id]
                            $data['published_posts'] = $response->published_posts ?? null;
                            $data['videos'] = $response->videos ?? null;
                            $data['visitor_posts'] = $response->visitor_posts ?? null;
                            $data['tagged'] = $response->tagged ?? null;
                            $data['status'] = 200;

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

                    $data['status'] = 200;
                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.facebook.fb_overview');
    }
}

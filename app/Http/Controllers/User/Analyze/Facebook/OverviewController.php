<?php

namespace App\Http\Controllers\User\Analyze\Facebook;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Facebook\FacebookController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;
use App\Http\Requests\Api\Facebook\GetFBPageInsights;
use Illuminate\Http\Request;
use Locale;

class OverviewController extends Controller
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

                        $data['chartData'][0] = ['This title lmfao', 'Impressions', 'Reach', 'Views'];
                        $data['impressions'] = $response->data[0]->values[0]->value ?? 0;
                        $data['reach'] = $response->data[1]->values[0]->value ?? 0;
                        // $data['profile_views']['dayBeforeYest'] = $response->data[2]->values[0]->value;
                        // $data['profile_views']['yest'] = $response->data[2]->values[1]->value;

                        $response = app(InstagramController::class)->getMineAccountProfileViews()->getData();
                        $data['profile_views'] = $response->profile_views;
                        $data['chartData'][1] = ['Insights', 0, 0, 0];
                        $data['chartData'][2] = ['Insights', $data['impressions'], $data['reach'], $data['profile_views']];
                        $data['status'] = 200;

                        return response()->json(collect($data), 200);
                    }

                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);

                    break;

                case 'PageAnalytics':
                    if ($request->has(['fields'])) {
                        $data = [];
                        $response = app(FacebookController::class)->getFacebookPagesInsightsEx(new GetMineAccountDetails($request->all(['id', 'fields'])))->getData();

                        $data['name'] = $response->name ?? '-';
                        $data['picture'] = $response->picture ?? ['data' => ['url' => "{{ asset('images/no-image.jpg') }}"]];
                        $data['about'] = $response->about ?? '-';
                        $data['bio'] = $response->bio ?? '-';
                        $data['business'] = $response->business ?? '-';
                        $data['country_pages_likes'] = $response->country_pages_likes ?? '-';

                        $data['description'] = $response->description ?? '-';
                        $data['engagement'] = $response->engagement ?? '-';
                        $data['followers_count'] = $response->followers_count ?? '-';
                        $data['is_published'] = $response->is_published ?? false;
                        $response->link ? $data['link'] = $response->link : $data['link'] = '#';

                        $data['location']['city'] = $response->location->city ?? '';
                        $data['location']['country'] = $response->location->city ?? '';
                        $data['location']['zip'] = $response->location->city ?? '';                            //City, Country, ZIP
                        $data['page_cover'] = $response->page_cover ?? "{{ asset('images/no-image.jpg') }}";
                        $data['fan_count'] = $response->fan_count ?? '-';
                        $data['is_community_page'] = $response->is_community_page ?? false;
                        $data['new_like_count'] = $response->new_like_count ?? '-';
                        strcmp($response->verification_status, 'not_verified') ? $data['verification_status'] = true : $data['verification_status'] = false;
                        $data['feed'] = $response->feed ?? null; //Posts[Created Time, Message, id]
                        $data['published_posts'] = $response->published_posts ?? null;
                        $data['videos'] = $response->videos ?? null;
                        $data['visitor_posts'] = $response->visitor_posts ?? null;
                        $data['tagged'] = $response->tagged ?? null;
                        $data['status'] = 200;

                        return response()->json(collect($data), 200);
                    }

                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);

                    break;

                case 'PageInsights':
                    if ($request->has(['id'])) {
                        $data = [];
                        $response = app(FacebookController::class)->getFacebookPagesInsights(new GetFBPageInsights($request->all(['id'])))->getData();

                        foreach ($response as $fbData) {
                            foreach ($fbData->data as $fb) {
                                $data[$fb->name]['data'] = $fb->values[0]->value ?? 0;
                                $data[$fb->name]['desc'] = $fb->description ?? '';
                            }
                        }
                        $data['status'] = 200;

                        //Chart Data
                        $tempData = [];
                        $tempData[] = ['Country', 'Impressions'];

                        foreach ($data['page_impressions_by_country_unique']['data'] as $country => $value) {
                            $_temp = [];
                            $_temp[0] = Locale::getDisplayRegion('-' . $country, 'en');
                            $_temp[1] = $value;
                            $tempData[] = $_temp;
                        }

                        $data['chartData']['page_impressions_by_country_unique'] = $tempData;
                        $tempData = [];
                        $tempData[] = ['Locale', 'Impressions'];

                        foreach ($data['page_impressions_by_locale_unique']['data'] as $locale => $value) {
                            $_temp = [];
                            $_temp[0] = Locale::getDisplayLanguage($locale, 'en');
                            $_temp[1] = $value;
                            $tempData[] = $_temp;
                        }

                        $data['chartData']['page_impressions_by_locale_unique'] = $tempData;

                        return response()->json(collect($data), 200);
                    }

                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;

                case 'accountDetails':
                    $data = [];
                    $response = app(FacebookController::class)->getMineAccountData(new GetMineAccountDetails($request->all(['fields'])))->getData();

                    $data['chartData'][0] = ['This title lmfao', 'Friends', 'Posts'];

                    $data['id'] = $response->id;
                    $data['name'] = $response->name;
                    $data['birthday'] = $response->birthday;
                    $data['age_range'] = $response->age_range->min;
                    $data['posts'] = $response->posts;
                    $data['friends_count'] = $response->friends->summary->total_count;
                    $data['gender'] = $response->gender;
                    $data['profile_link'] = $response->link;
                    $data['profile_picture'] = $response->picture->data->url;

                    $data['is_verified'] = app(FacebookController::class)->getUserVerifiedStatus($response->name);

                    $data['chartData'][1] = ['Insights', 0, 0];

                    $data['chartData'][2] = ['Insights', $data['friends_count'], count($data['posts']->data)];

                    $data['status'] = 200;

                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                    break;
            }
        }

        return view('user.analyze.facebook.overview');
    }
}

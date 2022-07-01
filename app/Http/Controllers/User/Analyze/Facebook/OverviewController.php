<?php

namespace App\Http\Controllers\User\Analyze\Facebook;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Facebook\FacebookController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;
use App\Http\Requests\Api\Facebook\GetFBPageInsights;
use Exception;
use Facebook\Exceptions\FacebookResponseException;
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

                    case 'PageAnalytics':
                            $data = [];
                            $response = app(FacebookController::class)->getFacebookPageDetails(new GetMineAccountDetails($request->all()))->getData();

                            $data['name'] = $response->name ?? '-';
                            $data['picture'] = $response->picture ?? ['data'=>['url'=>"{{ asset('images/no-image.jpg') }}"]];
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

                    case 'PageInsights':
                        if ($request->has(['id'])) {
                            try {
                                $data = [];
                                $response = app(FacebookController::class)->getFacebookPageInsights(new GetFBPageInsights($request->all(['id'])))->getData();
                                foreach ($response as $fbData) {
                                    foreach ($fbData->data as $fb) {
                                        $data[$fb->name]['data'] = $fb->values[0]->value ?? 0;
                                        $data[$fb->name]['desc'] = $fb->description ?? '';
                                    }
                                }

                                //Chart Data

                                $tempData = [];
                                $tempData[] = ['Country', 'Impressions'];
                                $desc = $data['chartData']['page_impressions_by_country_unique']['desc'] ?? [];

                                if (!empty($data['page_impressions_by_country_unique']['data'])) {
                                    foreach ($data['page_impressions_by_country_unique']['data'] as $country=>$value) {
                                        $_temp = [];
                                        $_temp[0] = Locale::getDisplayRegion('-' . $country, 'en');
                                        $_temp[1] = $value ?? 0;
                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_impressions_by_country_unique'] = $tempData;
                                $data['page_impressions_by_country_unique']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Locale', 'Impressions'];
                                $desc = $data['page_impressions_by_locale_unique']['desc'] ?? [];

                                if (!empty($data['page_impressions_by_locale_unique']['data'])) {
                                    foreach ($data['page_impressions_by_locale_unique']['data'] as $locale=>$value) {
                                        $_temp = [];

                                        switch ($locale) {
                                            case 'en_GB': $_temp[0] = 'English (UK)';
                                                        break;
                                            case 'es_LA': $_temp[0] = 'Spanish (Latin America)';
                                                        break;
                                            default: $_temp[0] = Locale::getDisplayLanguage($locale, 'en');
                                        }

                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }

                                $data['chartData']['page_impressions_by_locale_unique'] = $tempData;
                                $data['page_impressions_by_locale_unique']['desc'] = $desc;

                                // $tempData = [];
                                // $tempData[] = ['Age', 'Male', 'Female'];
                                // foreach ($data['page_impressions_by_age_gender_unique']['data'] as $demo => $value) {
                                //     $_temp = [];
                                //     $_arr = explode('.', $demo);
                                //     $_temp[0] = $_arr[1];

                                //     if ($_arr[0] === 'M') {
                                //         $_temp[$_temp[0]]['Male'] = $value;
                                //     } else {
                                //         $_temp[$_temp[0]]['Female'] = $value;
                                //     }
                                //     $tempData = array_merge_recursive($tempData, $_temp);
                                // }

                                // $data['chartData']['page_impressions_by_age_gender_unique'] = $tempData;

                                $tempData = [];
                                $tempData[] = ['Number', 'Impressions'];
                                $desc = $data['page_impressions_frequency_distribution']['desc'] ?? [];

                                if (!empty($data['page_impressions_frequency_distribution']['data'])) {
                                    foreach ($data['page_impressions_frequency_distribution']['data'] as $number => $value) {
                                        $_temp = [];
                                        $_temp[0] = $number;
                                        $_temp[1] = $value;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_impressions_frequency_distribution'] = $tempData;
                                $data['page_impressions_frequency_distribution']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Number', 'Viral Impressions'];
                                $desc = $data['page_impressions_viral_frequency_distribution']['desc'] ?? [];

                                if (!empty($data['page_impressions_viral_frequency_distribution']['data'])) {
                                    foreach ($data['page_impressions_viral_frequency_distribution']['data'] as $number => $value) {
                                        $_temp = [];
                                        $_temp[0] = $number;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_impressions_viral_frequency_distribution'] = $tempData;
                                $data['page_impressions_viral_frequency_distribution']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Number', 'Impressions'];
                                $desc = $data['page_posts_impressions_frequency_distribution']['desc'] ?? [];

                                if (!empty($data['page_posts_impressions_frequency_distribution']['data'])) {
                                    foreach ($data['page_posts_impressions_frequency_distribution']['data'] as $number => $value) {
                                        $_temp = [];
                                        $_temp[0] = $number;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_posts_impressions_frequency_distribution'] = $tempData;
                                $data['page_posts_impressions_frequency_distribution']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Metric', 'Impressions'];
                                $desc = $data['page_video_views_by_paid_non_paid']['desc'] ?? [];

                                if (!empty($data['page_video_views_by_paid_non_paid']['data'])) {
                                    foreach ($data['page_video_views_by_paid_non_paid']['data'] as $metric => $value) {
                                        $_temp[0] = $metric;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_video_views_by_paid_non_paid'] = $tempData;
                                $data['page_video_views_by_paid_non_paid']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Metric', 'Impressions'];
                                $desc = $data['page_views_by_profile_tab_logged_in_unique']['desc'] ?? [];

                                if (!empty($data['page_views_by_profile_tab_logged_in_unique']['data'])) {
                                    foreach ($data['page_views_by_profile_tab_logged_in_unique']['data'] as $metric => $value) {
                                        $_temp = [];
                                        $_temp[0] = $metric;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_views_by_profile_tab_logged_in_unique'] = $tempData;

                                $tempData = [];
                                $tempData[] = ['Metric', 'Impressions'];
                                $desc = $data['page_views_by_internal_referer_logged_in_unique']['desc'] ?? [];

                                if (!empty($data['page_views_by_internal_referer_logged_in_unique']['data'])) {
                                    foreach ($data['page_views_by_internal_referer_logged_in_unique']['data'] as $metric => $value) {
                                        $_temp = [];
                                        $_temp[0] = $metric;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_views_by_internal_referer_logged_in_unique'] = $tempData;
                                $data['page_views_by_internal_referer_logged_in_unique']['desc'] = $desc;

                                $tempData = [];
                                $tempData[] = ['Metric', 'Impressions'];
                                $desc = $data['page_views_by_site_logged_in_unique']['desc'] ?? [];

                                if (!empty($data['page_views_by_site_logged_in_unique']['data'])) {
                                    foreach ($data['page_views_by_site_logged_in_unique']['data'] as $metric => $value) {
                                        $_temp = [];
                                        $_temp[0] = $metric;
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_views_by_site_logged_in_unique'] = $tempData;
                                $data['page_views_by_site_logged_in_unique']['desc'] = $desc;

                                // $tempData = [];
                                // $tempData[] = ['Metric', 'Impressions'];
                                // foreach ($data['page_content_activity_by_age_gender_unique']['data'] as $metric=>$value) {
                                //     $_temp = [];
                                //     $_temp[0] = $metric;
                                //     $_temp[1] = $value ?? 0;

                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_content_activity_by_age_gender_unique'] = $tempData;

                                // $tempData = [];
                                // $tempData[] = ['Country', 'Activity'];
                                // foreach ($data['page_content_activity_by_country_unique']['data'] as $country=>$value) {
                                //     $_temp = [];
                                //     $_temp[0] = Locale::getDisplayRegion('-' . $country, 'en');
                                //     $_temp[1] = $value ?? 0;

                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_content_activity_by_country_unique'] = $tempData;

                                // $tempData = [];
                                // $tempData[] = ['Locale', 'Activity'];
                                // foreach ($data['page_content_activity_by_locale_unique']['data'] as $locale=>$value) {
                                //     $_temp = [];
                                //     $_temp[0] = Locale::getDisplayLanguage($locale, 'en');
                                //     $_temp[1] = $value ?? 0;

                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_content_activity_by_locale_unique'] = $tempData;

                                $tempData = [];
                                $tempData[] = ['Activity', 'Hour'];
                                $desc = $data['page_fans_online']['desc'] ?? [];

                                if (!empty($data['page_fans_online']['data'])) {
                                    foreach ($data['page_fans_online']['data'] as $hour => $value) {
                                        $_temp = [];
                                        $_temp[0] = sprintf('%02d', $hour);
                                        $_temp[1] = $value ?? 0;

                                        $tempData[] = $_temp;
                                    }
                                }
                                $data['chartData']['page_fans_online'] = $tempData;
                                $data['page_fans_online']['desc'] = $desc;
                                // $tempData = [];
                                // $tempData[] = ['Metric', 'Impressions'];
                                // foreach ($data['page_fan_adds_by_paid_non_paid_unique']['data'] as $metric => $value) {
                                //     $_temp = [];
                                //     $_temp[0] = $metric;
                                //     $_temp[1] = $value ?? 0;

                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_fan_adds_by_paid_non_paid_unique'] = $tempData;

                                // $tempData = [];
                                // $tempData[] = ['Locale', 'Impressions'];
                                // foreach ($data['page_fans_locale']['data'] as $locale => $value) {
                                //     $_temp = [];
                                //     $_temp[0] = Locale::getDisplayLanguage($locale, 'en');
                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_fans_locale'] = $tempData;

                                // $tempData = [];
                                // $tempData[] = ['City', 'Impressions'];
                                // foreach ($data['page_fans_city']['data'] as $city => $value) {
                                //     $_temp = [];
                                //     $_temp[0] = $city;
                                //     $_temp[1] = $value;
                                //     $tempData[] = $_temp;
                                // }
                                // $data['chartData']['page_fans_city'] = $tempData;
                                $data['status'] = 200;

                                return response()->json(collect($data), 200);
                            } catch (FacebookResponseException $e) {
                                return response()->json(collect(['fb_exception' => '' . $e]), 405);
                            } catch (Exception $e) {
                                return response()->json(collect(['fb_exception' => '' . $e]), 405);
                            }
                        }

                        return response()->json(['status' => 400, 'message' => 'Missing required fields']);
                        // return response()->json(['status' => 400, 'message' => 'Missing required fields', "Error"=> print_r(debug_backtrace())]);
                case 'accountDetails':
                    $data = [];
                    $response = app(FacebookController::class)->getMineAccountData(new GetMineAccountDetails($request->all()))->getData();

                    $data['id'] = $response->id ?? '0';
                    $data['name'] = $response->name ?? 'N/A';
                    $data['birthday'] = $response->birthday ?? 'N/A';
                    $data['age_range'] = $response->age_range->min ?? '0';
                    $data['posts'] = $response->posts ?? 0;
                    $data['friends_count'] = $response->friends->summary->total_count ?? 0;
                    $data['gender'] = $response->gender ?? 'N/A';
                    $data['profile_link'] = $response->link ?? '#';
                    $data['profile_picture'] = $response->picture->data->url ?? '#';
                    $data['is_verified'] = app(FacebookController::class)->getUserVerifiedStatus($response->name);

                    $data['status'] = 200;

                    return response()->json(collect($data));
                default:
                    return response()->json(['status' => 400, 'message' => 'Missing required fields']);
            }
        }

        return view('user.analyze.facebook.overview');
    }
}

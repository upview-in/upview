<?php

namespace App\Http\Controllers\Api\Facebook;

use App\Helper\FacebookHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;
use App\Http\Requests\Api\Facebook\GetFBPageInsights;
use Exception;

class FacebookController extends Controller
{
    // @TODO: Change MINEUSERID[$INDEX]'s value dynamically later to switch between Instagram/FB Pages. By default its only for Page at index 0 for free product.

    public function getMineAccountData(GetMineAccountDetails $request)
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();

        $fbUser = $fb_client->get('/me?fields=id,name,birthday,age_range,location,hometown,likes,posts,videos,friends,gender,link,picture')->getBody();
        // dd(response()->json($fbUser, 200));
        return response()->json(json_decode($fbUser, true), 200);
    }

    // @TODO Find some workaround to get Facebook Verified account status
    public static function getFacebookPageData()
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();
        $fbUser = $fb_client->get('/me/accounts')->getBody();
        $fbUser = json_decode($fbUser, true);
        $totalPages = count(($fbUser['data']));
        $dataArr = [];

        for ($i = 0; $i < $totalPages; $i++) {
            $fbPageID = $fbUser['data'][$i]['id'];
            $fbData = $fb_client->get($fbPageID . '?fields=name,picture')->getGraphUser();

            $dataArr[$i]['id'] = $fbPageID;
            $dataArr[$i]['name'] = $fbData['name'];
            $dataArr[$i]['picture'] = $fbData['picture']['url'];
            $fbData = $fb_client->get('/me?fields=email')->getGraphUser();
            $dataArr[$i]['email'] = $fbData['email'];
        }

        return $dataArr;
    }

    public static function getFacebookPageInsights(GetFBPageInsights $request)
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();
        $fbUser = $fb_client->get('/me/accounts')->getBody();
        $fbUser = json_decode($fbUser, true);
        $fbPageID = $fbUser['data'][session('PagesIndex_FB', 0)]['id'];
        $fbUser = $fb_client->get('/' . $fbPageID . '?fields=access_token')->getGraphUser();
        $fb_client->setDefaultAccessToken($fbUser['access_token']);

        $metrics = [];
        $metrics['days_28'] = 'page_total_actions,page_cta_clicks_logged_in_total,page_cta_clicks_logged_in_unique,page_cta_clicks_by_site_logged_in_unique,page_cta_clicks_by_age_gender_logged_in_unique,page_call_phone_clicks_logged_in_unique,page_call_phone_clicks_by_age_gender_logged_in_unique,page_call_phone_clicks_by_site_logged_in_unique,page_get_directions_clicks_logged_in_unique,page_get_directions_clicks_by_age_gender_logged_in_unique,page_get_directions_clicks_by_site_logged_in_unique,page_website_clicks_logged_in_unique,page_website_clicks_by_age_gender_logged_in_unique,page_website_clicks_by_site_logged_in_unique,page_engaged_users,page_post_engagements,page_consumptions,page_consumptions_unique,page_consumptions_by_consumption_type,page_consumptions_by_consumption_type_unique,page_places_checkin_total,page_places_checkin_total_unique,page_places_checkin_mobile,page_places_checkin_mobile_unique,page_negative_feedback,page_negative_feedback_unique,page_negative_feedback_by_type,page_negative_feedback_by_type_unique,page_positive_feedback_by_type,page_positive_feedback_by_type_unique,page_impressions,page_impressions_unique,page_impressions_paid,page_impressions_paid_unique,page_impressions_organic,page_impressions_organic_unique,page_impressions_viral,page_impressions_viral_unique,page_impressions_nonviral,page_impressions_nonviral_unique,page_impressions_by_story_type,page_impressions_by_story_type_unique,page_impressions_by_city_unique,page_impressions_by_country_unique,page_impressions_by_locale_unique,page_impressions_by_age_gender_unique,page_impressions_frequency_distribution,page_impressions_viral_frequency_distribution,page_posts_impressions,page_posts_impressions_unique,page_posts_impressions_paid,page_posts_impressions_paid_unique,page_posts_impressions_organic,page_posts_impressions_organic_unique,page_posts_served_impressions_organic_unique,page_posts_impressions_viral,page_posts_impressions_viral_unique,page_posts_impressions_nonviral,page_posts_impressions_nonviral_unique,page_posts_impressions_frequency_distribution,page_actions_post_reactions_like_total,page_actions_post_reactions_love_total,page_actions_post_reactions_wow_total,page_actions_post_reactions_haha_total,page_actions_post_reactions_sorry_total,page_actions_post_reactions_anger_total,page_fan_adds_unique,page_fan_removes_unique,page_video_views,page_video_views_paid,page_video_views_organic,page_video_views_by_paid_non_paid,page_video_views_autoplayed,page_video_views_click_to_play,page_video_views_unique,page_video_repeat_views,page_video_complete_views_30s,page_video_complete_views_30s_paid,page_video_complete_views_30s_organic,page_video_complete_views_30s_autoplayed,page_video_complete_views_30s_click_to_play,page_video_complete_views_30s_unique,page_video_complete_views_30s_repeat_views,page_video_views_10s,page_video_views_10s_paid,page_video_views_10s_organic,page_video_views_10s_autoplayed,page_video_views_10s_click_to_play,page_video_views_10s_unique,page_video_views_10s_repeat,page_views_total,page_views_logged_in_total,page_views_logged_in_unique,page_views_by_profile_tab_total,page_views_by_profile_tab_logged_in_unique,page_views_by_internal_referer_logged_in_unique,page_views_by_site_logged_in_unique,page_views_by_age_gender_logged_in_unique,page_content_activity_by_action_type_unique,page_content_activity_by_age_gender_unique,page_content_activity_by_city_unique,page_content_activity_by_country_unique,page_content_activity_by_locale_unique,page_content_activity,page_content_activity_by_action_type';
        $metrics['week'] = 'page_tab_views_login_top_unique,page_tab_views_login_top,page_cta_clicks_logged_in_by_country_unique,page_cta_clicks_logged_in_by_city_unique,page_call_phone_clicks_logged_in_by_country_unique,page_call_phone_clicks_logged_in_by_city_unique,page_get_directions_clicks_logged_in_by_country_unique,page_get_directions_clicks_logged_in_by_city_unique,page_website_clicks_logged_in_by_country_unique,page_website_clicks_logged_in_by_city_unique,page_views_by_referers_logged_in_unique';
        $metrics['lifetime'] = 'post_video_views_organic,post_video_views_paid,post_video_views,post_video_views_unique,post_video_views_60s_excludes_shorter,post_video_views_10s,post_video_views_10s_paid,post_video_view_time,post_video_view_time_organic,post_video_view_time_by_region_id,post_engaged_users,post_negative_feedback,post_negative_feedback_unique,post_negative_feedback_by_type,post_negative_feedback_by_type_unique,post_engaged_fan,post_clicks,post_clicks_unique,post_clicks_by_type,post_clicks_by_type_unique,post_impressions,post_impressions_unique,post_impressions_paid,post_impressions_paid_unique,post_impressions_fan,post_impressions_fan_unique,post_impressions_fan_paid,post_impressions_fan_paid_unique,post_impressions_organic,post_impressions_organic_unique,post_impressions_viral,post_impressions_viral_unique,post_impressions_nonviral,post_impressions_nonviral_unique,post_impressions_by_story_type,post_impressions_by_story_type_unique,post_reactions_like_total,post_reactions_love_total,post_reactions_wow_total,post_reactions_haha_total,post_reactions_sorry_total,post_reactions_anger_total,post_reactions_by_type_total,post_video_complete_views_30s_autoplayed,post_video_complete_views_30s_clicked_to_play,post_video_complete_views_30s_organic,post_video_complete_views_30s_paid,post_video_complete_views_30s_unique,post_video_avg_time_watched,post_video_complete_views_organic,post_video_complete_views_organic_unique,post_video_complete_views_paid,post_video_complete_views_paid_unique,post_video_retention_graph,post_video_retention_graph_clicked_to_play,post_video_retention_graph_autoplayed,post_video_views_organic_unique,post_video_views_paid_unique,post_video_length,post_video_views_autoplayed,post_video_views_clicked_to_play,post_video_views_15s,post_video_views_10s_unique,post_video_views_10s_autoplayed,post_video_views_10s_clicked_to_play,post_video_views_10s_organic,post_video_views_10s_sound_on,post_video_views_sound_on,post_video_view_time_by_age_bucket_and_gender,post_video_views_by_distribution_type,post_video_view_time_by_distribution_type,post_video_view_time_by_country_id,post_activity,post_activity_unique,post_activity_by_action_type,post_activity_by_action_type_unique';
        $metrics['day'] = 'page_tab_views_logout_top,page_places_checkins_by_age_gender,page_places_checkins_by_locale,page_places_checkins_by_country,page_fans_online,page_fans_online_per_day,page_fan_adds_by_paid_non_paid_unique,page_actions_post_reactions_total,page_fans,page_fans_locale,page_fans_city,page_fans_country,page_fans_gender_age,page_fan_adds,page_fans_by_like_source,page_fans_by_like_source_unique,page_fan_removes,page_fans_by_unlike_source_unique,page_video_view_time,page_views_logout,page_views_external_referrals';

        $responseData = [];
        $responseData['days_28'] = json_decode($fb_client->get($fbPageID . '/insights?metric=' . $metrics['days_28'] . '&period=days_28')->getBody());
        $responseData['week'] = json_decode($fb_client->get($fbPageID . '/insights?metric=' . $metrics['week'] . '&period=week')->getBody());
        $responseData['lifetime'] = json_decode($fb_client->get($fbPageID . '/insights?metric=' . $metrics['lifetime'] . '&period=lifetime')->getBody());
        $responseData['day'] = json_decode($fb_client->get($fbPageID . '/insights?metric=' . $metrics['day'] . '&period=day')->getBody());

        return response()->json(($responseData), 200);
    }

    public static function getFacebookPageDetails(GetMineAccountDetails $request)
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();
        $fbUser = $fb_client->get('/me/accounts')->getBody();
        $fbUser = json_decode($fbUser, true);
        $fbPageID = $fbUser['data'][session('PagesIndex_FB', 0)]['id'];
        $fbUser = $fb_client->get('/' . $fbPageID . '?fields=access_token')->getGraphUser();
        $fb_client->setDefaultAccessToken($fbUser['access_token']);
        $fbUser = $fb_client->get($fbPageID . '?fields=picture,name,about,bio,business,category,category_list,country_page_likes,description,engagement,followers_count,general_info,is_published,link,location,members,cover,fan_count,phone,preferred_audience,is_community_page,new_like_count,overall_star_rating,page_token,verification_status,feed,published_posts,videos,visitor_posts,tagged,posts')->getBody();
        $fbUser = json_decode($fbUser);

        return response()->json(($fbUser), 200);
    }

    public function getUserVerifiedStatus($username)
    {

        // try {

        //     $base_url = 'https://www.facebook.com/george_mcreary'. '' . '/' . '?__a=1';

        //     $response = file_get_contents($base_url);
        //    // $responseArr = json_decode($response);
        //    dd($response);
        //    $pattern = '/\"is_verified\"\:(true|false)/';
        //    preg_match_all($pattern, $response, $verified_status, PREG_SET_ORDER, 0);
        //    dd($verified_status);
        // } catch (Exception $e) {
        //     echo $$e->message;
        // }

        return false;
    }
}

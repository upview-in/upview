<?php

namespace App\Http\Controllers\Api\Facebook;

use App\Helper\FacebookHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;
use DateTime;
use Exception;

class FacebookController extends Controller
{
    // @TODO: Change MINEUSERID[$INDEX]'s value dynamically later to switch between Instagram/FB Pages. By default its only for Page at index 0 for free product.

    public function getMineAccountData(GetMineAccountDetails $request)
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();

        $fbUser = $fb_client->get('/me?fields=' . $request->fields)->getBody();
        // dd(response()->json($fbUser, 200));
        return response()->json(json_decode($fbUser, true), 200);
    }

    // @TODO Find some workaround to get Facebook Verified account status

    public static function getMineAccountInsightsEx()
    {
        $ig = new FacebookHelper();
        $fb_client = $ig->getFacebookClient();

        $dataArr = [];
        $MINEUserID = $fb_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $fb_client->get('/' . $MINEUserID[session('PagesIndex_IG', 0)]['id'] . '?fields=Facebook_business_account')->getGraphUser();
        $MINE = $MINEUserID['Facebook_business_account']['id'];
        $dataArr['insights'] = $fb_client->get('/' . $MINE . '/insights?metric=impressions,reach&period=days_28')->getBody();
        $dataArr['profile_views'] = self::getMineAccountProfileViewsEx();
        //dd(response()->json($igUser, 200));
        return response()->json(json_encode($dataArr, true), 200);
    }

    public static function getMineAccountProfileViews($lastDays = '-28 day')
    {
        $ig = new FacebookHelper();
        $fb_client = $ig->getFacebookClient();

        $MINEUserID = $fb_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $fb_client->get('/' . $MINEUserID[0]['id'] . '?fields=facebook_business_account')->getGraphUser();
        $MINE = $MINEUserID['Facebook_business_account']['id'];
        $since = new DateTime();
        $until = new DateTime();
        $since->modify($lastDays);
        $igUser = $fb_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since=' . $since->getTimestamp() . '&until=' . $until->getTimestamp())->getBody();
        $igUser = json_decode($igUser);

        $sum = 0;
        foreach ($igUser->data[0]->values as $value) {
            $sum = $sum + $value->value;
        }
        $dataArr['profile_views'] = $sum;
        //dd(response()->json($igUser, 200));
        return response()->json(($dataArr), 200);
    }

    public static function getMineAccountProfileViewsEx($lastDays = '-28 day')
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();

        $MINEUserID = $fb_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $fb_client->get('/' . $MINEUserID[0]['id'] . '?fields=facebook_business_account')->getGraphUser();
        $MINE = $MINEUserID['Facebook_business_account']['id'];
        $since = new DateTime();
        $until = new DateTime();
        $since->modify($lastDays);
        $igUser = $fb_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since=' . $since->getTimestamp() . '&until=' . $until->getTimestamp())->getBody();
        $igUser = json_decode($igUser);

        $sum = 0;
        foreach ($igUser->data[0]->values as $value) {
            $sum = $sum + $value->value;
        }

        return $sum;
    }

    public static function listMineFacebookPages()
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();

        return $fb_client->get('/me/accounts')->getBody();
        //  $fbUser = json_encode($fbUser, true);
    }

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

    public static function getFacebookPagesInsights()
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();
        $fbUser = $fb_client->get('/me/accounts')->getBody();
        $fbUser = json_decode($fbUser, true);
        $fbPageID = $fbUser['data'][session('PagesIndex_FB', 1)]['id'];
        $fbUser = $fb_client->get('/' . $fbPageID . '?fields=access_token,name')->getGraphUser();
        $fb_client->setDefaultAccessToken($fbUser['access_token']);
        $fbUser = $fb_client->get($fbPageID . '/insights?metric=page_post_engagements,page_impressions&period=days_28')->getBody();
        return json_encode($fbUser);
    }

    public static function getFacebookPagesInsightsEx(GetMineAccountDetails $request)
    {
        $fb = new FacebookHelper();
        $fb_client = $fb->getFacebookClient();
        $fbUser = $fb_client->get('/me/accounts')->getBody();
        $fbUser = json_decode($fbUser, true);
        $fbPageID = $request->id;
        $fbUser = $fb_client->get('/' . $fbPageID . '?fields=access_token')->getGraphUser();
        $fb_client->setDefaultAccessToken($fbUser['access_token']);
        $fbUser = $fb_client->get($fbPageID . '?fields=' . $request->fields)->getBody();
        $fbUser = json_decode($fbUser);
        return response()->json(($fbUser), 200);
    }

    public function getUserVerifiedStatus($username)
    {

        // try {

        //     $base_url = 'https://www.Facebook.com/george_mcreary'. '' . '/' . '?__a=1';

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

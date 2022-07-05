<?php

namespace App\Http\Controllers\Api\Instagram;

use App\Helper\FacebookHelper;
use App\Helper\InstagramHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Instagram\Account\GetMineAccountDetails;
use DateTime;
use Exception;
use Illuminate\Support\Arr;

class InstagramController extends Controller
{
    public static function listFBPages()
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

    public static function getInstagramAccountForPage($pageID)
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $IGUser = $ig_client->get($pageID.'?fields=instagram_business_account')->getGraphUser();
        dd($IGUser);
    }
    public static function listInstaBusinessAccountsData()
    {
        $fbPages = InstagramController::listFBPages();
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $dataArr = [];

        foreach($fbPages as $fbPage)
        {
            $token =   $ig_client->get('/' . $fbPage['id'] . '?fields=access_token')->getGraphUser();
            $ig_client->setDefaultAccessToken($token['access_token']);
            $IGUser = $ig_client->get($fbPage['id'].'/accounts?fields=instagram_accounts')->getGraphEdge();
            foreach($IGUser as $ig)
            {
                $dataArr[] = $ig_client->get('/'.$ig->id.'?fields=id,,name')->getGraphEdge();
            }
        }


         dd($dataArr);
    }

    public function getMineAccountInsights(GetMineAccountDetails $request)
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $IGData = $ig_client->get('/'.$request->id . '?fields=followers_count,follows_count,id,name,media_count,profile_picture_url,username')->getGraphUser();
        
        dd($IGData);
        return response()->json(json_decode($IGData, true), 200);
    }

    public static function getMineAccountInsightsEx($period = 'days_28')
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $dataArr = [];
        $MINEUserID = $ig_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $ig_client->get('/' . $MINEUserID[session('AccountIndex_IG', 0)]['id'] . '?fields=instagram_business_account')->getGraphUser();
        $MINE = $MINEUserID['instagram_business_account']['id'];
        $dataArr['insights'] = $ig_client->get('/' . $MINE . '/insights?metric=impressions,reach&period=' . $period)->getBody();
        $dataArr['profile_views'] = self::getMineAccountProfileViewsEx();

        return response()->json(json_encode($dataArr, true), 200);
    }

    public static function getMineAccountProfileViews($lastDays = '-28 day')
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $IGUser = $ig_client->get('/me/accounts?fields=instagram_business_account')->getGraphEdge();
        // $MINEUserID = $ig_client->get('/' . $MINEUserID[0]['id'] . '?fields=instagram_business_account')->getGraphUser();

        $key = 0;
        foreach ($IGUser as $acc) {
            if (Arr::exists($acc, 'instagram_business_account')) {
                $IGBizAcc[$key++] = $acc['instagram_business_account']['id'];
            }
        }
        dd($IGBizAcc);
        $since = new DateTime();
        $until = new DateTime();
        $since->modify($lastDays);
        $igUser = $ig_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since=' . $since->getTimestamp() . '&until=' . $until->getTimestamp())->getBody();
        $igUser = json_decode($igUser);

        $sum = 0;
        foreach ($igUser->data[0]->values as $value) {
            $sum = $sum + $value->value;
        }
        $dataArr['profile_views'] = $sum;

        return response()->json(($dataArr), 200);
    }

    public static function getMineAccountProfileViewsEx($lastDays = '-28 day')
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $MINEUserID = $ig_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $ig_client->get('/' . $MINEUserID[0]['id'] . '?fields=instagram_business_account')->getGraphUser();
        $MINE = $MINEUserID['instagram_business_account']['id'];
        $since = new DateTime();
        $until = new DateTime();
        $since->modify($lastDays);
        $igUser = $ig_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since=' . $since->getTimestamp() . '&until=' . $until->getTimestamp())->getBody();
        $igUser = json_decode($igUser);

        $sum = 0;
        foreach ($igUser->data[0]->values as $value) {
            $sum = $sum + $value->value;
        }

        return $sum;
    }

    // @TODO Find some workaround to get Instagram Verified account status

    public function getUserVerifiedStatus($username)
    {

        // try {

        //     $base_url = 'https://www.instagram.com/george_mcreary'. '' . '/' . '?__a=1';

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

<?php

namespace App\Http\Controllers\Api\Instagram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\Api\Instagram\Account\GetMineAccountDetails;

use App\Helper\InstagramHelper;
use DateTime;
use Exception;
use SebastianBergmann\Environment\Console;

class InstagramController extends Controller
{


    // @TODO: Change MINEUSERID[$INDEX]'s value dynamically later to switch between Instagram Pages. By default its only for Page at index 0 for free product.
    public function getMineAccountInsights(GetMineAccountDetails $request)
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $MINEUserID = $ig_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $ig_client->get('/' . $MINEUserID[0]['id'] . '?fields=instagram_business_account')->getGraphUser();
        $MINE = $MINEUserID['instagram_business_account']['id'];
        $igUser = $ig_client->get('/' . $MINE . '/insights?metric=' . $request->fields . '&period=days_28')->getBody();        

        //dd(response()->json($igUser, 200));
        return response()->json(json_decode($igUser, true), 200);
    }

    public function getMineAccountProfileViews()
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $MINEUserID = $ig_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $ig_client->get('/' . $MINEUserID[0]['id'] . '?fields=instagram_business_account')->getGraphUser();
        $MINE = $MINEUserID['instagram_business_account']['id'];
        $since = new DateTime();
        $until = new DateTime();
        $since->modify("-28 day");
        dd('/' . $MINE . '/insights?metric=profile_views&period=day&since='.$since->getTimestamp().'&until='.$until->getTimestamp());
        $igUser = $ig_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since='.$since->getTimestamp().'&until='.$until->getTimestamp())->getBody();        
        dd($igUser);
        //dd(response()->json($igUser, 200));
        return response()->json(json_decode($igUser, true), 200);
    }



    public function getMineAccountData(GetMineAccountDetails $request)
    {
        $ig = new InstagramHelper();
        $ig_client = $ig->getInstagramClient();

        $MINEUserID = $ig_client->get('/me/accounts')->getGraphEdge();
        $MINEUserID = $ig_client->get('/' . $MINEUserID[0]['id'] . '?fields=instagram_business_account')->getGraphUser();
        $MINE = $MINEUserID['instagram_business_account']['id'];
        $igUser = $ig_client->get('/' . $MINE . '?fields=' . $request->fields)->getBody();
        //dd(response()->json($igUser, 200));
        return response()->json(json_decode($igUser, true), 200);
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

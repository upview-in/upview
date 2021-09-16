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
        $igUser = $ig_client->get('/' . $MINE . '/insights?metric=profile_views&period=day&since='.$since->getTimestamp().'&until='.$until->getTimestamp())->getBody();        
        $igUser = json_decode($igUser);
        
        $sum = 0;
        foreach($igUser->data[0]->values as $value)
        {
            $sum = $sum + $value->value;
        }
        $dataArr['profile_views'] = $sum;
        //dd(response()->json($igUser, 200));
        return response()->json(($dataArr), 200);
    }

    public function listMINEInstagramPages()
    {
            $ig = new InstagramHelper();
            $ig_client = $ig->getInstagramClient();

            $pagesEndPoint = config('instagram.endPoint') . 'me/accounts';
            $pagesParams = [
                'access_token' => config('instagram.accessToken')
            ];

            $pagesEndPoint .= '?' . http_build_query($pagesParams);

            //CURL Initialization
            $cu = curl_init($pagesEndPoint);
            curl_setopt($cu, CURLOPT_URL, $pagesEndPoint);
            curl_setopt($cu, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);

            //CURL CALL
            $response = curl_exec($cu);
            curl_close($cu);

            $responseArr = json_decode($response, true);
       
             return view('get-pages', ['responseArr' => $responseArr['data'][0]]);
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

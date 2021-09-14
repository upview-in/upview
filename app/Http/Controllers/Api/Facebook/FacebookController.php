<?php

namespace App\Http\Controllers\Api\Facebook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\Api\Facebook\Account\GetMineAccountDetails;

use App\Helper\FacebookHelper;
use Exception;
use SebastianBergmann\Environment\Console;

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

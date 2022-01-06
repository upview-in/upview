<?php

namespace App\Http\Controllers\Api\Instagram;

use App\Http\Controllers\Controller;
use Facebook\Exceptions\FacebookSDKException;

class FB_GetAccountController extends Controller
{
    public function index()
    {
        try {
            $pagesEndPoint = config('instagram.endPoint') . config('instagram.pageID');
            $pagesParams = [
                'fields' => 'instagram_business_account',
                'access_token' => config('instagram.accessToken'),
            ];

            $pagesEndPoint .= '?' . http_build_query($pagesParams);
            echo $pagesEndPoint;

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
        } catch (FacebookSDKException $e) {
            echo $e->message;
        }

        return view('get-insta-acc', ['responseArr' => $responseArr]);
    }
}

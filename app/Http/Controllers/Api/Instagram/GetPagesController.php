<?php

namespace App\Http\Controllers\Api\Instagram;

use App\Http\Controllers\Controller;
use Facebook\Exceptions\FacebookSDKException;

class GetPagesController extends Controller
{
    public function index()
    {
        try {
            $pagesEndPoint = config('instagram.endPoint') . 'me/accounts';
            $pagesParams = [
                'access_token' => 'EAAb0iTc4IMoBADQa4XrUTIlArQYIIZAlyOGcfkLJYg2oWlnIazauatj7gna5iIWaS6SPFXHoYaJ7zplrY70vphZCfxa7V3VbWs6shf4iqL3OESlQGHMkFh8xjCHmIMcCZCtuZAF9NLLFbrClDu2o7JUKQFp56JIGpI2XQGYFT8KX1OfRVKnR',
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
        } catch (FacebookSDKException $e) {
            dd($$e->message);
        }

        return view('get-pages', ['responseArr' => $responseArr['data'][0]]);
    }
}

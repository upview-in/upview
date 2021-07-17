<?php

namespace App\Http\Controllers\Api\Instagram;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use App\Http\Controllers\Controller;


define("ENDPOINT_BASE", Config::get('instagram.endPoint'));



class FB_GetPostsController extends Controller
{
    public function index()
    {   

        $instagramAccountId = Config::get('instagram.instaAccID');
        $accessToken = Config::get("instagram.accessToken");

        // get instagram user metadata endpoint
        $endpointFormat = ENDPOINT_BASE . '{ig-user-id}?fields=business_discovery.username({ig-username}){username,website,name,ig_id,id,profile_picture_url,biography,follows_count,followers_count,media_count,media{caption,like_count,comments_count,media_url,permalink,media_type}}&access_token={access-token}';
        $endpoint = ENDPOINT_BASE . $instagramAccountId;

        // username
        $username = 'george_mcreary';

        // endpoint params
        $igParams = array(
            'fields' => 'business_discovery.username(' . $username . '){username,website,name,ig_id,id,profile_picture_url,biography,follows_count,followers_count,media_count,media{caption,like_count,comments_count,media_url,permalink,media_type}}',
            'access_token' => $accessToken
        );

        // add params to endpoint
        $endpoint .= '?' . http_build_query( $igParams );

        // setup curl
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $endpoint );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        // make call and get response
        $response = curl_exec( $ch );
        curl_close( $ch );
        $responseArray = json_decode( $response, true );

        // print_r($response);
         return view('get-posts-metadata', ['responseArr' => $response]);

    }
}

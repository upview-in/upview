<?php

namespace App\Http\Controllers\Api\Instagram;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

define('ENDPOINT_BASE', Config::get('instagram.endPoint'));

class FB_ManagePostsController extends Controller
{
    public function CallAPI($endpoint, $type, $params)
    {
        $ch = curl_init();

        if ('POST' == $type) {
            curl_setopt($ch, CURLOPT_URL, $endpoint);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_POST, 1);
        } elseif ('GET' == $type) {
            curl_setopt($ch, CURLOPT_URL, $endpoint . '?' . http_build_query($params));
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function PostComment($postCommentEndpoint)
    {
        if (strlen($_POST['postComment']) >= 1) {
            $postCommentParams = [
                'message' => $_POST['postComment'],
                'access_token' => Config::get('instagram.accessToken'),
                'debug' => 'all',

            ];

            CallAPI($postCommentEndpoint, 'POST', $postCommentParams);
            header('Refresh:1');
        } else {
            echo 'You have to enter a comment first. (Min Length 1)';
        }
    }

    public function PostReply($commentID)
    {
        if (strlen($_POST['postReply']) >= 1) {
            $postReplyEndpoint = Config::get('instagram.endPoint') . $commentID . '/replies';
            $postReplyParams = [
                'message' => $_POST['postReply'],
                'access_token' => Config::get('instagram.accessToken'),
                'debug' => 'all',

            ];

            $commentResponse = CallAPI($postReplyEndpoint, 'POST', $postReplyParams);
            //header("Refresh:1");
            echo $postReplyEndpoint;
            print_r($commentResponse);
        } else {
            echo 'You have to enter a comment first. (Min Length 1)';
        }
    }

    public function index()
    {
        $media_object = [
            'id' => '17939753218510964',
            'caption' => 'No Caption.. May be Ill change using Insta API... ',
            'media_url' => 'https://scontent.cdninstagram.com/v/t51.29350-15/196514904_583271352654898_8205473335035824940_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=8ae9d6&_nc_ohc=6KnMart6n7EAX-vi6-c&_nc_ht=scontent.cdninstagram.com&oh=909b2f3f0ad5f35c66de84eabf9f14b1&oe=60D6B727',
            'permalink' => 'https://www.instagram.com/p/CPpz7aoFBtZ/',
            'media_type' => ' IMAGE',
        ];

        $params = [
            'fields' => 'like_count,replies,username,text',
            'access_token' => Config::get('instagram.accessToken'),
        ];

        $postCommentEndpoint = ENDPOINT_BASE . $media_object['id'] . '/comments';
        $response = callApi($postCommentEndpoint, 'GET', $params);
        $response = json_decode($response, true);

        return view('manage-posts');
    }
}

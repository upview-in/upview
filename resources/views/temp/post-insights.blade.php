<?php

function CallAPI($endpoint, $type, $params)
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

$media_object = [

    'id' => '17939753218510964',
    'caption' => 'No Caption.. May be Ill change using Insta API...',
    'media_url' => 'https://scontent.cdninstagram.com/v/t51.29350-15/196514904_583271352654898_8205473335035824940_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=8ae9d6&_nc_ohc=EAcTvqP8f3MAX-tglgg&_nc_ht=scontent.cdninstagram.com&oh=bd2324af3616846a05404a0c02a440e6&oe=60D0C867',
    'permalink' => 'https://www.instagram.com/p/CPpz7aoFBtZ/',
    'media_type' => ' IMAGE',

];

$mediaEndpoint = Config::get('instagram.endPoint')
                 . $media_object['id'] . '/insights';

$params = [
    'metric' => 'engagement,impressions,reach,saved',
    'access_token' => Config::get('instagram.accessToken'),

];

$response = CallAPI($mediaEndpoint, 'GET', $params);

echo '

<head>
		<meta charset="utf-8" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


	</head>
<pre>
<div style="width:100%;display:inline-block">
    <div style="float:left">
            <img src=' . $media_object['media_url'] . '
    </div>
    <div style="float:left;margin-left:20px;">
        
            <h3>
            Caption: <a target="_blank" href=' . $media_object['permalink'] . '>' . $media_object['caption'] . ' </a>
            
            </h3>	
    </div>
</div>
</pre>
<br />
<pre>

Total Number of Engagements (Likes & Comments): <b>' . $response['data'][0]['values'][0]['value'] . '</b>
Total Number of Times Media has been seen: <b>' . $response['data'][1]['values'][0]['value'] . '</b>
Total Number of Unique accounts that have seen the media: <b>' . $response['data'][2]['values'][0]['value'] . '</b>
Total Number of Unique accounts that have saved the media: <b>' . $response['data'][3]['values'][0]['value'] . '</b>


</pre>

';
//To see the total output
echo '<pre>';
print_r($response['data']);

/*
Possible Metrics in Post Insights:
 impressions, reach, carousel_album_impressions, carousel_album_reach,
 carousel_album_engagement, carousel_album_saved, carousel_album_video_views,
 taps_forward, taps_back, exits, replies, engagement, saved, video_views


*/

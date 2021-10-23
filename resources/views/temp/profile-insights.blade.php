<?php

function CallAPI( $endpoint, $type, $params ) {
    $ch = curl_init();

    if ( 'POST' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
        curl_setopt( $ch, CURLOPT_POST, 1 );
    } elseif ( 'GET' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint . '?' . http_build_query( $params ) );
    }

    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    $response = curl_exec( $ch );
    curl_close( $ch );

    return json_decode( $response, true );
}



$searchEndpoint =  Config::get('instagram.endPoint')
.Config::get('instagram.instaAccID');

$searchParams = array(
    'fields' => 'business_discovery.username('.$_POST['ig_user'].'){username,website,name,ig_id,id,profile_picture_url,biography,follows_count,followers_count,media_count,media{caption,like_count,comments_count,media_url,permalink,media_type}}',
    'access_token' => Config::get('instagram.accessToken'),
    'debug'=> 'all' 


);

$searchAccInsights = CallAPI($searchEndpoint, "GET", $searchParams);

$getCurrentUserInfoParams = array(
    'fields' => 'username',
    'access_token' => Config::get('instagram.accessToken')

);
$currentUser = CallAPI($searchEndpoint, "GET", $getCurrentUserInfoParams);
$currentUser = $currentUser['username'];


$selfParams = array(
    'fields' => 'business_discovery.username('.    
    $currentUser.'){username,website,name,ig_id,id,profile_picture_url,biography,follows_count,followers_count,media_count,media{caption,like_count,comments_count,media_url,permalink,media_type}}',
    'access_token' => Config::get('instagram.accessToken'),
    'debug'=> 'all'


);


$selfAccInsights = CallAPI($searchEndpoint, "GET", $selfParams);

// $params = array(
//     'metric' => 'follower_count,impressions,profile_views,reach',
//     'period' => 'day', /* day,week,days_28,month,lifetime */ 
//     'access_token' => Config::get('instagram.accessToken')
          
// );



// $userEndpoint = Config::get('instagram.endPoint')
//                  .Config::get('instagram.instaAccID').'/insights';









// echo '

// <head>
// 		<meta charset="utf-8" />

// 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
// 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
// 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
// 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


// 	</head>
// <pre>
// <div style="width:100%;display:inline-block">
//     <div style="float:left">
//     <pre>

// Total number of times that the business account\'s media objects have been viewed (Impressions): <b>'.$selfAccInsights['data'][0]['values'][0]['value'].'</b>
// Total number of users who have viewed the business account\'s profile within the specified period (Profile Views): <b>'.$selfAccInsights['data'][1]['values'][0]['value'].'</b>
// Total number of times that the business account\'s media objects have been uniquely viewed (Reach): <b>'.$selfAccInsights['data'][2]['values'][0]['value'].'</b>

// </pre>

// </div>
// </pre>
// <br />
// ';

//above insights are for the previous day change second index to 1 instead of 0 for today's



//To see the total output
    // echo '<pre>';
    // print_r($selfAccInsights);


/*
Possible Metrics in Post Insights:
 impressions, reach, carousel_album_impressions, carousel_album_reach, 
 carousel_album_engagement, carousel_album_saved, carousel_album_video_views,
 taps_forward, taps_back, exits, replies, engagement, saved, video_views


*/


if($selfAccInsights['business_discovery']['followers_count'] > $searchAccInsights['business_discovery']['followers_count']) echo 'Current User got more followers';
else echo 'Search User got more followers';

echo "<pre>";
print_r($searchAccInsights);

?>
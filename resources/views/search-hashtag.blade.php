<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script> window.jQuery || <?php echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';?></script> 

	</head>
	<body>
			<div>
			<form method="POST">
			@csrf
			<pre><center><input type=text name="hashtag_search"  style="margin-top:30px;">      <input type=submit name="ht_search_btn" label="Search"></center>
			</form>
			</div>
			





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

				function searchPosts($hashtagid)
				{
					$instaEndPoint = Config::get('instagram.endPoint');
					$accessToken = Config::get('instagram.accessToken');
					$searchEndpoint = $instaEndPoint.$hashtagid.'/top_media';

					$params = array(
						'user_id' => Config::get('instagram.instaAccID'),
						'fields'=> 'id,caption,children,comment,comment_count,like_count,media_type,media_url,permalink',
						'access_token'=> $accessToken

					);


					$response = CallAPI($searchEndpoint, 'GET', $params);

					print_r($response); //Now display accordingly
				}
				


				$instaEndPoint = Config::get('instagram.endPoint');
				$accessToken = Config::get('instagram.accessToken');
				$hashtagEndpoint = $instaEndPoint.'ig_hashtag_search';

				if(isset($_POST['hashtag_search']) && isset($_POST['ht_search_btn']))
				{
					if(strlen($_POST['hashtag_search']) > 0)
					{
						$hashtagText = $_POST['hashtag_search'];
						
						$hashtagSearchParams = array(
						'user_id' => Config::get('instagram.instaAccID'),
						'fields' => 'id,name',
						'q' => $hashtagText,
						'access_token' => $accessToken 
	
						);
					
						$response = CallAPI($hashtagEndpoint, "GET", $hashtagSearchParams);
						$hashtagid =  $response['data'][0]['id'];x
						searchPosts($hashtagid);
					}
					else echo 'Enter something to search..';
					
				}



 
				


			?>
		
	</body>

</html>
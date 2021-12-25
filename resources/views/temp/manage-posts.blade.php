<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


	</head>
	<body>
	<?php

use Illuminate\Support\Facades\Config;

define('ENDPOINT_BASE', Config::get('instagram.endPoint'));

$media_object = [

    'id' => '17939753218510964',
    'caption' => 'No Caption.. May be Ill change using Insta API... ',
    'media_url' => 'https://scontent.cdninstagram.com/v/t51.29350-15/196514904_583271352654898_8205473335035824940_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=8ae9d6&_nc_ohc=6KnMart6n7EAX-vi6-c&_nc_ht=scontent.cdninstagram.com&oh=909b2f3f0ad5f35c66de84eabf9f14b1&oe=60D6B727',
    'permalink' => 'https://www.instagram.com/p/CPpz7aoFBtZ/',
    'media_type' => ' IMAGE',

];

$endpoint = ENDPOINT_BASE . $media_object['id'] . '/comments';

$params = [

    'fields' => 'like_count,replies,username,text',
    'access_token' => Config::get('instagram.accessToken'),

];

$endpoint .= '?' . http_build_query($params);

//echo $endpoint;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);

//echo $commentEndpoint;

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

$postCommentEndpoint = ENDPOINT_BASE . $media_object['id'] . '/comments';

function PostComment($postCommentEndpoint)
{
    if (strlen($_POST['postComment']) >= 1) {
        $postCommentParams = [
            'message'=>$_POST['postComment'],
            'access_token' => Config::get('instagram.accessToken'),
            'debug' => 'all',

        ];

        $commentResponse = CallAPI($postCommentEndpoint, 'POST', $postCommentParams);
        header('Refresh:1');
    } else {
        echo 'You have to enter a comment first. (Min Length 1)';
    }
}

function PostReply($commentID)
{
    if (strlen($_POST['postReply']) >= 1) {
        $postReplyEndpoint = Config::get('instagram.endPoint') . $commentID . '/replies';
        $postReplyParams = [
            'message'=>$_POST['postReply'],
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

if (isset($_POST['postBtn'])) {
    PostComment($postCommentEndpoint);
}

if (isset($_POST['postReplyBtn'])) {
    $comID = $_POST['comID'];

    PostReply($comID);
}

?>

		<hr />
		<br />

		<pre>
		<div style="width:100%;display:inline-block">
			<div style="float:left">
					<img src="<?php echo $media_object['media_url']; ?>">
			</div>
			<div style="float:left;margin-left:20px;">
				
					<h3>
					Caption: <a target="_blank" href="<?php echo $media_object['permalink']; ?>"><?php echo $media_object['caption']; ?>
						</a>
					
					</h3>	
			</div>
		</div>
		</pre>
		
		<br />
		<h4>
			Comments
		</h4>
		<div style="width:100%;display:inline-block">
		
		<pre><form action="" method="POST">@csrf<b>Post New Comment: </b><input type="text" name="postComment"> <input type="submit" name="postBtn" value="Post"></form></pre>
		</div>
		<ul style="list-style: none">
			<?php

            foreach ($response['data'] as $comment) : ?>
				<?php
                    // get comment replies from instagram
                    $repliesEndpoint = ENDPOINT_BASE . $comment['id'] . '/replies';
                    $repliesParams = [
                        'fields' => 'username,text,like_count',
                        'access_token' =>  Config::get('instagram.accessToken'),

                    ];
                    $repliesResponseArr = CallAPI($repliesEndpoint, 'GET', $repliesParams);
                ?>
				<li style="margin-top:20px;margin-bottom:20px">
					<div>
						<a href="https://instagram.com/<?php echo $comment['username']; ?>" target="_blank">
							<b><?php echo $comment['username']; ?></b>
						</a>
					</div>
					<div>
						<?php echo $comment['text']; ?>
					</div>
					<div style="font-size:10px">
						Likes <?php
                        echo $comment['like_count']; ?>
					</div>
					<div>
						<h5>
							Replies (<?php echo count($repliesResponseArr['data']); ?>)
						</h5>
					<pre><form action="" method="POST"><input width=100% type=text name="postReply" placeholder="Reply to this Comment.."> @csrf <input id="postReplybtn" type=submit value="Repl" name="postReplyBtn" data-comment="TestCommentID">
					<input type="hidden" id="comID" name="comID" value="<?php echo $comment['id']; ?>"></form></pre>


					</div>
					<div style="margin-left:20px">
						<ul style="list-style: none">
							<?php foreach ($repliesResponseArr['data'] as $reply) : ?>
								<div>
									<a href="https://instagram.com/<?php echo $reply['username']; ?>" target="_blank">
										<b><?php echo $reply['username']; ?></b>
									</a>
								</div>
								<div>
									<?php echo $reply['text']; ?>
								</div>
								<div style="font-size:10px">
									Likes <?php echo $reply['like_count']; ?>
								</div>
							<?php endforeach; ?>
						</ul>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<br />
		<hr />
	</body>
</html>


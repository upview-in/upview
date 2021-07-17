<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>
<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '463253968310138',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v10.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

</script>


<!-- The JS SDK Login Button -->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>   

<div id="status">
</div>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>

<?php

session_start();

// Generate and redirect to login URL.

use Facebook\Facebook;


use Illuminate\Support\Facades\Config;

$creds = array(
'app_id' => Config::get('instagram.clientId'),
'app_secret' => Config::get('instagram.clientSecret'),
);


$facebook = new Facebook($creds);

$helper = $facebook->getRedirectLoginHelper();
  
$oAuth = $facebook->getOAuth2Client();


if(isset($_GET['code']))
{

  try {
    $token = $helper->getAccessToken();
    //echo 'TOKEN GENERATED:  {{ '. $token.' }}';

    if(!$token->isLongLived())
    {
      try {
        $token = $oAuth->getLongLivedAccessToken( $token );

      } catch (\Facebook\Exceptions\FacebookSDKException $e) {

        echo 'SDK Error: '.$e->getMessage();
      }
    }
    echo 'Long Lived Access Token: '.$token;

  } 
  catch (\Facebook\Exceptions\FacebookResponseException $th) {
    echo "Graph Error: ".$th->getMessage();
  }
  catch (\Facebook\Exceptions\FacebookSDKException $e)
  {
    echo 'SDK ERROR: '.$e->getMessage();
  }
    
}
else
{
  $perms = 
  
  [
    
  'public_profile', 
  'instagram_basic', 
  'pages_show_list', 
  'instagram_manage_comments', 
  'instagram_manage_insights',
  'pages_manage_ads',
  'pages_manage_metadata', 
  'pages_manage_engagement', 
  'pages_read_user_content',
  'ads_management',
  'business_management',
  'instagram_content_publish',
  'pages_read_engagement'

  ];

  $loginUrl = $helper->getLoginUrl((String) Config::get('instagram.redirectUri'), $perms);


echo '
<a href="'.$loginUrl.'"> Login With Instagram </a>';

}


?>
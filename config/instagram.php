<?php


return array(

    /*
    |--------------------------------------------------------------------------
	| Application identity
	|--------------------------------------------------------------------------
    |
    | Client ID and Secret used to associate
    | your server, script, or program with
    | a specific application.
    |
    */

    'clientId' =>        '463253968310138',
    'clientSecret' =>    '297792cf7e6608d6c9ce53064c97d285',

    /*
    |--------------------------------------------------------------------------
    | OAuth redirect URI.
    |--------------------------------------------------------------------------
    |
    | The redirect_uri specifies where we redirect users
    | after they have chosen whether or not to
    | authenticate your application.
    |
    */

    'redirectUri' =>    'http://localhost:1234/get-token/',

    /*
    |--------------------------------------------------------------------------
    | Permission scope.
    |--------------------------------------------------------------------------
    |
    | You may provide an optional scope parameter to request
    | additional permissions outside of the “basic"
    | permissions scope. Learn more about scope.
    |
    | Valid values:
    |     'basic' - to read any and all data related to a user - granted by default (e.g. following/followed-by lists, photos, etc.)
    |     'comments' - to create or delete comments on a user’s behalf
    |     'relationships' - to follow and unfollow users on a user’s behalf
    |     'likes' - to like and unlike items on a user’s behalf
    |
    */

    'accessToken' => 'EAAGlU7g4z3oBAAkldTjOJtOyY8b0X31leIgZBpWZAj1Bj7Pg2SSBnfIFJFgQxWOGFpZAZBPaTEgYFTu9Psrq0pt7XP2gApKSQeU7JPlaz9xbwIzOyxgkZCyfy0naI1PcWq3OBw4pXbAIw34sBOKHq83L7ZChzeDleKDrV7ECsoDgnjWOnf2oZBM',

    
    'endPoint' => 'https://graph.facebook.com/v10.0/',
    
    /*
    |--------------------------------------------------------------------------
	| Secure Requests
	|--------------------------------------------------------------------------
    |
    | You can secure your API calls and mitigate impersonation attempts by making server-side
    | calls and passing a per-request signature using your Client Secret. Edit your
    | OAuth Client configuration and mark the Enforce signed requests checkbox.
    | When enabled, Instagram will check for the sig parameter of each request and verify
    | that the value matches a hash computed using your Client Secret.
    |
    */

    'enforceSignedRequests' => false,
    

    'pageID' => '106029175032377',

    'instaAccID' => '17841448412470894', 

);

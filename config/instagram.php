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

    'clientId' =>        '1957120897773504',
    'clientSecret' =>    '21a7f77eef0e7b066da12d73763d51d5',

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

    'redirectUri' =>    'http://localhost:8000/get-token/',

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

    'accessToken' => 'EAAbzZCbfk78ABALjKYiji4BbmxtZBTzZAqIARkCJvAX4hXOxY5anQbIVqe85NukjZCRbTs8tZBTYb4FXcN7TgI6lFV59JTpSlIlHTOqRdqznZCE585sXvun8t6iSMVJgS8RLZCdPmAHQNV5Wla1UX3QoPpyw049wkXjgFhcMyj7jvkVEFx8U71X',

    
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

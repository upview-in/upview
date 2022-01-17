<?php

return [

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

    'clientId' =>        env('FB_INSTA_CLIENT_ID'),
    'clientSecret' =>    env('FB_INSTA_CLIENT_SECRET'),
    'defaultGraphVersion' => env('FB_INSTA_DEFAULT_GRAPH_VERSION'),

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

    'redirectUrl' => 'panel.user.account.addInstagramAccount',

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

    'endPoint' => env('FB_INSTA_ENDPOINT', ''),

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

    'enforceSignedRequests' => env('FB_INSTA_ENFORCE_SIGNED_REQUESTS', ''),

    // Temp keys
    'accessToken' => 'EAAb0iTc4IMoBAPvelZCZA9rANeNv3oetwZC9ZAm8NoKjKHdV0Bh4I1y8ZCZBixugwVcgfwlSzK66fZBy7TEmQ17YbQMrA3vEOcLUOJxaZBoTJk054CdY2AgdZAitYkAFIu2wIfG1JZBcfqCniN5e49BNfjfjUsjsLF1qEwapTE8TSZCyhzcXUOzK3r5HnowPuYowzQZD',
    'pageID' => '106029175032377',
    'instaAccID' => '17841448412470894',
    'redirectUri' => env('FB_INSTA_REDIRECT_URL', ''),

];

<?php

return [
    'oauthCreds' => env('GOOGLE_APPLICATION_CREDENTIALS_OAUTH', ''),
    'developerKey' => env('GOOGLE_YOUTUBE_DATA_API_V3', ''),
    'redirectUrl' => 'panel.user.account.addYoutubeAccount',
    'scopes' => [
        Google\Service\YouTubeAnalytics::YT_ANALYTICS_READONLY,
        Google\Service\YouTubeAnalytics::YT_ANALYTICS_MONETARY_READONLY,
        Google\Service\YouTubeAnalytics::YOUTUBE_READONLY,
        Google\Service\Oauth2::USERINFO_EMAIL,
        Google\Service\Oauth2::USERINFO_PROFILE,
    ],
];

<?php

namespace App\Helper;

use Google\Client;
use Google\Service\Oauth2;
use Google\Service\YouTube;
use Google\Service\YouTubeAnalytics;

class YoutubeHelper
{

    public $clientInstance = null;

    public function __construct()
    {
        if (is_null($this->clientInstance)) {
            $this->clientInstance = $this->getGoogleClient();
        }
        return $this->clientInstance;
    }

    public function withAuth()
    {
        $accountIndex = session('AccountIndex', 0);
        $accessCode = TokenHelper::getAuthToken_YT();
        if (count($accessCode)) {
            $expire_at = $accessCode[$accountIndex]->created + $accessCode[$accountIndex]->expire_in;
            if (time() > $expire_at) {
                $token = $this->clientInstance->fetchAccessTokenWithRefreshToken($accessCode[$accountIndex]->refresh_token);
                $accessCode[$accountIndex]->access_token = $token['access_token'];
                $accessCode[$accountIndex]->refresh_token = $token['refresh_token'];
                $accessCode[$accountIndex]->expire_in = $token['expires_in'];
                $accessCode[$accountIndex]->created = $token['created'];
                $accessCode[$accountIndex]->update();
            } else {
                $token = $accessCode[$accountIndex]->access_token;
            }
            $this->clientInstance->setAccessToken($token);
        }
    }

    public function getGoogleClient(): Client
    {
        $client = new Client();

        $client->setApplicationName(config('app.name'));
        $client->setDeveloperKey(config('youtube.developerKey'));
        $client->setRedirectUri(route(config('youtube.redirectUrl')));
        $client->setAuthConfig(config('youtube.oauthCreds'));
        $client->setAccessType('offline');
        $client->setScopes(config('youtube.scopes'));

        return $client;
    }

    public function getYoutubeService($requiredAuth = false): YouTube
    {
        if ($requiredAuth) {
            $this->withAuth();
        }
        return new YouTube($this->clientInstance);
    }

    public function getYoutubeAnalyticsService(): YouTubeAnalytics
    {
        $this->withAuth();
        return new YouTubeAnalytics($this->clientInstance);
    }
}

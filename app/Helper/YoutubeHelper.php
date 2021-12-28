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
        $accessCode = TokenHelper::getAuthToken_YT();

        $accountIndex = session('AccountIndex_YT', null);
        if (is_null($accountIndex)) {
            foreach ($accessCode as $index => $_) {
                if (!is_null($_->default) && $_->default) {
                    $accountIndex = $index;
                }
            }
        }

        $accountIndex = is_null($accountIndex) ? 0 : $accountIndex;

        if (count($accessCode)) {
            $expire_at = $accessCode[$accountIndex]->created + $accessCode[$accountIndex]->expire_in;
            if (time() > $expire_at) {
                $token = $this->clientInstance->fetchAccessTokenWithRefreshToken($accessCode[$accountIndex]->refresh_token);
                if (isset($token['error'])) {
                    $this->clientInstance->setPrompt('consent');
                    $this->clientInstance->setApprovalPrompt('force');
                    $auth_url = $this->clientInstance->createAuthUrl();
                    return redirect()->away(filter_var($auth_url, FILTER_SANITIZE_URL));
                }
                $accessCode[$accountIndex]->access_token = $token['access_token'];
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
        $client->setIncludeGrantedScopes(true);
        $client->setPrompt('none');

        return $client;
    }

    public function getYoutubeService($requiredAuth = false): YouTube
    {
        if ($requiredAuth) {
            $this->withAuth();
        }
        return new YouTube($this->clientInstance);
    }

    public function getYoutubeAnalyticsService($requiredAuth = true): YouTubeAnalytics
    {
        if ($requiredAuth) {
            $this->withAuth();
        }
        return new YouTubeAnalytics($this->clientInstance);
    }
}

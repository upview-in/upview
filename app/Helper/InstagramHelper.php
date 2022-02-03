<?php

namespace App\Helper;

use Facebook\Facebook;

class InstagramHelper
{
    public $clientInstance;

    public function __construct()
    {
        if (is_null($this->clientInstance)) {
            $this->clientInstance = $this->getInstagramClient();
        }

        return $this->clientInstance;
    }

    public function getInstagramClient($withAuth = true): Facebook
    {
        $client = new Facebook([
            'app_id' => config('facebook.clientId'),
            'app_secret' => config('facebook.clientSecret'),
            'default_graph_version' => config('facebook.defaultGraphVersion'),
            'persistent_data_handler' => new LaravelPersistentDataHandler(),
        ]);

        if ($withAuth) {
            $accessCode = TokenHelper::getAuthToken_IG();

            $accountIndex = session('AccountIndex_IG', null);
            if (is_null($accountIndex)) {
                foreach ($accessCode as $index => $_) {
                    if (!is_null($_->default) && $_->default) {
                        $accountIndex = $index;
                    }
                }
            }

            $accountIndex = is_null($accountIndex) ? 0 : $accountIndex;

            if (is_array($accessCode) && !empty($accessCode) && ($accessCode[$accountIndex]->expire_in == -1 || time() < $accessCode[$accountIndex]->expire_in)) {
                $client->setDefaultAccessToken($accessCode[$accountIndex]->access_token);
            }
        }

        return $client;
    }
}

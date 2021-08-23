<?php

namespace App\Helper;

use App\Models\LinkedAccounts;
use Facebook\Facebook;

class InstagramHelper
{
    public $clientInstance = null;

    public function __construct()
    {
        if (is_null($this->clientInstance)) {
            $this->clientInstance = $this->getInstagramClient();
        }
        return $this->clientInstance;
    }

    public function getInstagramClient(): Facebook
    {
        $client = new Facebook([
            'app_id' => config('facebook.clientId'),
            'app_secret' => config('facebook.clientSecret'),
            'default_graph_version' => config('facebook.defaultGraphVersion'),
            'persistent_data_handler' => new LaravelPersistentDataHandler(),
        ]);

        $accessCode = TokenHelper::getAuthToken_IG();


        $accountIndex = session('AccountIndex', null);
        if (is_null($accountIndex)) {
            foreach ($accessCode as $index => $_) {
                if (!is_null($_->default) && $_->default) {
                    $accountIndex = $index;
                }
            }
        }

        if (count($accessCode) && time() < $accessCode[$accountIndex]->expire_in) {
            $client->setDefaultAccessToken($accessCode[$accountIndex]->access_token);
        }

        return $client;
    }
}

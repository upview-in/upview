<?php

namespace App\Helper;

use Google_Client;
use Google_Service_YouTube;

class YoutubeHelper {

    public $clientInstance = null;

    public function __construct()
    {
        if(is_null($this->clientInstance)) {
            $this->clientInstance = $this->getGoogleClient();
        }
        return $this->clientInstance;
    }
    
    public function getGoogleClient(): Google_Client
    {
        $client = new Google_Client();
        $client->setApplicationName(config('app.name'));
        $client->setDeveloperKey(env('GOOGLE_YOUTUBE_DATA_API_V3', 'AIzaSyCYMb-LEFE3EM5Ow97pZ_GAyEEzXkPR4dU'));
        return $client;
    }

    public function getYoutubeService(): Google_Service_YouTube
    {
        return new Google_Service_YouTube($this->clientInstance);
    }

}
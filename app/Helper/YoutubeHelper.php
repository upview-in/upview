<?php

namespace App\Helper;

use Google_Client;
use Google_Service_Analytics;
use Google_Service_YouTube;
use Google_Service_YouTubeAnalytics;

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

    public function getGoogleClient(): Google_Client
    {
        $client = new Google_Client();
        $client->setApplicationName(config('app.name'));
        $client->setDeveloperKey(env('GOOGLE_YOUTUBE_DATA_API_V3', 'AIzaSyCYMb-LEFE3EM5Ow97pZ_GAyEEzXkPR4dU'));
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google_Service_YouTube::YOUTUBE);
        $client->addScope(Google_Service_YouTubeAnalytics::YT_ANALYTICS_READONLY);
        return $client;
    }

    public function getYoutubeService(): Google_Service_YouTube
    {
        return new Google_Service_YouTube($this->clientInstance);
    }

    public function getYoutubeAnalyticsService(): Google_Service_YouTubeAnalytics
    {
        // $service1 = $yt->getYoutubeAnalyticsService();
        // dd($service1->reports->query(['ids' => 'channel==UCq-Fj5jknLsUf-MWSy4_brA', 'startDate' => '2021-07-01', 'endDate' => '2021-07-16', 'dimensions' => 'day', 'metrics' => 'views', 'filters' => 'isCurated==1']));
        return new Google_Service_YouTubeAnalytics($this->clientInstance);
    }
}

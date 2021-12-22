<?php

namespace App\Http\Controllers\Api\Ayrshare;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrCreateProfile;
use App\Http\Requests\Api\Ayrshare\AyrDeleteProfile;
use App\Http\Requests\Api\Ayrshare\AyrPostAnalytics;
use App\Http\Requests\Api\Ayrshare\AyrShortLinkAnalysis;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use Illuminate\Support\Facades\Http;


class AyrshareController extends Controller
{
    public static function ayrshareAPICall($method, $endpoint, $body)
    {
        if (!strcmp($method, "GET")) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->get($endpoint, $body);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->post($endpoint, $body);
        }
        return $response;
    }

    public function createAyrProfile(AyrCreateProfile $request)
    {
        return AyrshareController::ayrshareAPICall('POST', config('ayrshare.AYR_CREATE_PROFILE_ENDPOINT'), ['title' => $request->email]);
    }


    public function deleteAyrProfile(AyrDeleteProfile $request)
    {
        return AyrshareController::ayrshareAPICall('POST', config('ayrshare.AYR_DELETE_PROFILE_ENDPOINT'), ['profileKey' => $request->profile_key]);
    }

    public function ayrShortLinkAnalytics(AyrShortLinkAnalysis  $request)
    {
        return AyrshareController::ayrshareAPICall('GET', config('ayrshare.AYR_SHORT_LINK_ANALYTICS_ENDPOINT'), ['lastDays' => $request->lastDays]);
    }


    public function ayrPostAnalytics(AyrPostAnalytics $request)
    {
        return AyrshareController::ayrshareAPICall('GET', config('ayrshare.AYR_SHORT_LINK_ANALYTICS_ENDPOINT'), ['id' => $request->post_id, 'platforms' => $request->platforms]);
    }

    public function ayrSocialMediaPlatformAnalytics(AyrPostAnalytics $request)
    {
        return AyrshareController::ayrshareAPICall('GET', config('ayrshare.AYR_SOCIAL_MEDIA_PLATFORM_ANALYTICS_ENDPOINT'), ['platforms' => $request->platforms]);
    }

    public function ayrSocialMediaPosts(AyrSocialMediaPosts $request)
    {
        if ($request->has('post') && $request->has('platforms')) {
            return AyrshareController::ayrshareAPICall(
                'GET',
                config('ayrshare.AYR_MEDIA_POST_ENDPOINT'),
                [
                 'post' => $request->caption,
                 'platforms' => $request->platforms,
                 'mediaURLs' => $request->mediaURLs ?? [''],
                 ]
            );
        }

    }



    public function index()
    {
        /**
         * Call the function you wanna test
         */
    }
}

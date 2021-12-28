<?php

namespace App\Http\Controllers\Api\Ayrshare;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrCreateProfile;
use App\Http\Requests\Api\Ayrshare\AyrDeleteProfile;
use App\Http\Requests\Api\Ayrshare\AyrJWTTokenProfileKey;
use App\Http\Requests\Api\Ayrshare\AyrPostAnalytics;
use App\Http\Requests\Api\Ayrshare\AyrShortLinkAnalysis;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

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
        $response = json_decode(AyrshareController::ayrshareAPICall('POST', config('ayrshare.AYR_CREATE_PROFILE_ENDPOINT'), ['title' => $request->profile_name])->body());
        if ($response->status == "success") {
            $user = Auth::user();
            $profiles = $user->profiles;
            if (is_null($profiles)) {
                $profiles = [];
            }
            $profiles[] = [
                'title' => $response->title,
                'ref_id' => $response->refId,
                'profileKey' => $response->profileKey,
                'authorized_on' => Carbon::now()->toDayDateTimeString(),
            ];
            $user->profiles = $profiles;
            $user->save();
        }
        return back()->withErrors($response);
    }


    public function deleteAyrProfile($profile_key)
    {
        return dd((AyrshareController::ayrshareAPICall('POST', config('ayrshare.AYR_DELETE_PROFILE_ENDPOINT'), ['profileKey' => $profile_key])));
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
        /**
         * instagramOptions": {
         *       "autoResize": true/false
         *       "locationId": FB Location's Page
         *       "userTags": [
         *           {
         *               "username": "instauser"
         *               "x":
         *               "y": x & y for tag location
         *           },
         *           {
         *               "username": "instauser2"
         *               "x":
         *               "y":
         *          }
         *       ]
         *   }
         */

        if ($request->has('post') && $request->has('platforms')) {
            return AyrshareController::ayrshareAPICall(
                'GET',
                config('ayrshare.AYR_MEDIA_POST_ENDPOINT'),
                [
                    'post' => $request->caption,
                    'platforms' => $request->platforms,
                    'mediaURLs' => $request->mediaURLs ?? [''],
                    'instagramOptions' => $request->instagramOptions ?? [''],
                ]
            );
        }
    }

    public static function generateAyrJWTTokenURL(AyrJWTTokenProfileKey $request)
    {
        try {
            $file = File::get(storage_path('private.key'));
            // dd($file,$request->profileKey);
        } catch (FileNotFoundException $e) {
            dd("[!][Exception]: Private Key not found!");
        }
        return json_decode(AyrshareController::ayrshareAPICall(
            'POST',
            config('ayrshare.AYR_JWT_ENDPOINT'),
            [
                    'domain' => 'upview',
                    'privateKey' => $file, // required
                    'profileKey' => $request->profileKey, // requires
            ]
        )->body());
    }
    public function ayrForward(Request $request, $profileKey)
    {
        return Redirect::away(AyrshareController::generateAyrJWTTokenURL(new AyrJWTTokenProfileKey(['profileKey' => $profileKey]))->url);
    }


    public function index()
    {
        /**
         * Call the function you wanna test
         */
        AyrshareController::deleteAyrProfile('WZ8DGHE-YGKM6CV-K4S5YR2-JT2B4GK');
    }
}

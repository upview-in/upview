<?php

namespace App\Http\Controllers\Api\Ayrshare;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrActiveSocialAccount;
use App\Http\Requests\Api\Ayrshare\AyrCreateProfile;
use App\Http\Requests\Api\Ayrshare\AyrDeleteProfile;
use App\Http\Requests\Api\Ayrshare\AyrJWTTokenProfileKey;
use App\Http\Requests\Api\Ayrshare\AyrPostAnalytics;
use App\Http\Requests\Api\Ayrshare\AyrShortLinkAnalysis;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use App\Models\AyrUserProfile;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AyrshareController extends Controller
{
    public static function ayrshareAPICall($method, $endpoint, $body, $api_key='')
    {
        if (!strcmp($method, "GET")) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->get($endpoint, $body);
        } elseif (!strcmp($method, "POST")) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->post($endpoint, $body);        
        } elseif (!strcmp($method, "MEDIA_POST")) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$api_key,
            ])->withOptions(['verify' => true])->post($endpoint, $body);        
        } elseif (!strcmp($method, "DELETE")) {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
        ])->withOptions(['verify' => true])->delete($endpoint, $body);
        }
        return $response;
    }

    public function createAyrProfile(AyrCreateProfile $request)
    {
        $response = json_decode(AyrshareController::ayrshareAPICall('POST', config('ayrshare.AYR_CREATE_PROFILE_ENDPOINT'), ['title' => $request->profile_name])->body());
        if ($response->status == "success") {
            $user = Auth::user();
            $profile = new AyrUserProfile();
            $profile->user_id = $user->id;
            $profile->title = $response->title;
            $profile->ref_id = $response->refId;
            $profile->profile_key = $response->profileKey;
            $profile->authorized_on = Carbon::now()->toDateTimeString();
            $profile->save();
        }
        return back()->withErrors($response);
    }


    public function deleteAyrProfile(AyrDeleteProfile $request)
    {
        $response = json_decode(AyrshareController::ayrshareAPICall('DELETE', config('ayrshare.AYR_DELETE_PROFILE_ENDPOINT'), ['profileKey' => decrypt($request->profileKey)]));
        if ($response->status == "success") {
            AyrUserProfile::where(['user_id' => Auth::id(),'profile_key' => decrypt($request->profileKey)])->delete();
        }
        return back()->withErrors($response);
    
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
        $profile_key = $request->profile_key;
        unset($request->profile_key);
        if ($request->has('post') && $request->has('platforms')) {
            return AyrshareController::ayrshareAPICall(
                'MEDIA_POST',
                config('ayrshare.AYR_MEDIA_POST_ENDPOINT'),
                $request->all(),
                $profile_key
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
        return Redirect::away(AyrshareController::generateAyrJWTTokenURL(new AyrJWTTokenProfileKey(['profileKey' => decrypt($profileKey)]))->url);
    }

    public static function getAyrActiveSocialAccounts(AyrActiveSocialAccount $request)
    {
        $response = json_decode(Http::withHeaders([
            'Authorization' => 'Bearer '.$request->profile_key,
        ])->withOptions(['verify' => true])->get(config('ayrshare.AYR_PROFILE_ENDPOINT'), []));

        if (property_exists($response, 'activeSocialAccounts')) {
            return $response->activeSocialAccounts;
        } else {
            return [];
        }
    }
    public function index()
    {
        /**
         * Call the function you wanna test
         */
        
    }
}

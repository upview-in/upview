<?php

namespace App\Http\Controllers\Api\Ayrshare;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrProfile;
use Illuminate\Support\Facades\Http;


class AyrshareController extends Controller
{
    public function ayrshareAPICall($method, $endpoint, $body)
    {
        if (!strcmp($method, "GET")) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->get(config($endpoint), $body);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
            ])->withOptions(['verify' => true])->post(config($endpoint), $body);
        }
        return $response;
    }

    public function createAyrProfile(AyrProfile $request)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
        ])->withOptions(['verify' => true])->post(config('ayrshare.AYR_CREATE_PROFILE_ENDPOINT'), ['title' => $request->email]);
    }


    public function deleteAyrProfile(AyrProfile $request)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer '.config('ayrshare.AYR_API_KEY'),
        ])->withOptions(['verify' => true])->post(config('ayrshare.AYR_DELETE_PROFILE_ENDPOINT'), ['title' => $request->email]);
    }
}

<?php

namespace App\Http\Controllers\User\PostScheduling;

use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use App\Http\Requests\User\PostScheduling\UploadPostMediaRequest;
use App\Helper\TokenHelper;
use Illuminate\Support\Facades\Auth;

class PostSchedulingController extends Controller
{
    function index()
    {
        $userProfiles = Auth::user()->profiles ?? [];
        return view('user.post_scheduling.post_scheduling_main', ['userProfiles'=>$userProfiles]);
    }

    public function uploadPostMedia(UploadPostMediaRequest $request)
    {
        $platforms = TokenHelper::getFlippedPlatforms();
        
        if ($request->hasFile('post_media')) {
            $fileInfo = $request->file('post_media')->store('User');
            $mediaURL  = encrypt($fileInfo);

            $enabledPlatforms = [];
            foreach ($request->platform as $platform) {
                $enabledPlatforms[] = ucfirst($platforms[$platform]);
            }

            $data = ['post'=>$request->caption,'platforms'=>[$enabledPlatforms],'mediaURLs'=>[route('image.displayImage', $mediaURL)]];
            return (new AyrshareController())->ayrSocialMediaPosts(new AyrSocialMediaPosts($data));
            // dd($response);
        }
        return redirect()->back()->with('message2', 'Post Updated!');
    }
}

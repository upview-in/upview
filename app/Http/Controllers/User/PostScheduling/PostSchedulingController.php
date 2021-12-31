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
        // dd($request->all(), explode(',', $request->tags));
        $tags = implode(",", preg_filter('/^/', '#', explode(',', $request->tags)));
        $platforms = TokenHelper::getFlippedPlatforms();
        
        if ($request->hasFile('post_media')) {
            $fileInfo = $request->file('post_media')->store('User');
            $mediaURL  = encrypt($fileInfo);

            $enabledPlatforms = [];
            foreach ($request->platform as $platform) {
                $enabledPlatforms[] = ucfirst($platforms[$platform]);
            }
            $userTags = [];
            foreach (explode(',', $request->mention) as $mentions ) {
                array_push($userTags, ['username' => $mentions, 'x' => 1.0, 'y' => 1.0]);
            }

            $data = ['post'=>$request->caption." \n\n\n".$tags,'platforms'=>[$enabledPlatforms],'mediaURLs'=>[route('image.displayImage', $mediaURL)],'profile-key'=>$request->profile_select, 'instagramOptions'=>['userTags'=>$userTags] ];
            return (new AyrshareController())->ayrSocialMediaPosts(new AyrSocialMediaPosts($data));
            // dd($response);
        }
        return redirect()->back()->with('message2', 'Post Updated!');
    }
}

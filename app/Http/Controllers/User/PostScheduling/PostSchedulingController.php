<?php

namespace App\Http\Controllers\User\PostScheduling;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrActiveSocialAccount;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use App\Http\Requests\User\PostScheduling\UploadPostMediaRequest;
use App\Models\AyrUserProfile;
use App\Models\PostHistory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostSchedulingController extends Controller
{
    public function index(Request $request)
    {
        $userProfiles = AyrUserProfile::where(['user_id' => Auth::id()])->get();
        if ($request->ajax() && $request->has('profile_key')) {
            try {
                $response = (new AyrshareController())->getAyrActiveSocialAccounts(new AyrActiveSocialAccount(['profile_key'=>decrypt($request->profile_key)]));
            } catch (DecryptException $e) {
                return abort(404);
            }

            return response()->json(collect($response), 200);
        }

        return view('user.post_scheduling.post_scheduling_main', ['userProfiles'=>$userProfiles]);
    }

    public function uploadPostMedia(UploadPostMediaRequest $request)
    {
        $tags = '';
        if ($request->tags != '') {
            $tags = implode(' ', preg_filter('/^/', '#', explode(',', $request->tags)));
        }

        $platforms = TokenHelper::getFlippedPlatforms();

        if ($request->hasFile('post_media')) {
            $fileInfo = $request->file('post_media')->store('User');
            $mediaURL = encrypt($fileInfo);

            $enabledPlatforms = [];
            foreach ($request->platform as $platform) {
                $enabledPlatforms[] = ucfirst($platforms[$platform]);
            }
            $userTags = [];
            foreach (explode(',', $request->mention) as $mentions) {
                array_push($userTags, ['username' => $mentions, 'x' => 1.0, 'y' => 1.0]);
            }

            $data = ['post'=>$request->caption . ' ' . $tags, 'platforms'=>$enabledPlatforms, 'mediaUrls'=>[route('image.displayImage', $mediaURL)], 'profile_key'=>decrypt($request->profile_select)];
            $response = (new AyrshareController())->ayrSocialMediaPosts(new AyrSocialMediaPosts($data));
            $user = Auth::user();
            $postData = new PostHistory();
            $postData->user_id = $user->id;
            $postData->profile_key = decrypt($request->profile_select);
            $post_info = $postData->post_info;
            if (is_null($post_info)) {
                $post_info = [];
            }
            foreach ($response['postIds'] as $post) {
                $post_info[] = $post;
            }
            $postData->post_info = $post_info;
            $postData->caption = $request->caption . ' ' . $tags;
            $postData->media_url = [route('image.displayImage', $mediaURL)];
            $postData->type = 1;
            $postData->ayrId = $response['id'];
            $postData->ayrRefId = $response['refId'];
            $postData->postedBy = $request->postedBy;
            $postData->save();
        }

        return redirect()->back()->with('message2', 'Sucsessfully Posted!');
    }
}

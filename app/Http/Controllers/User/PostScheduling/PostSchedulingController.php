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
use Owenoj\LaravelGetId3\GetId3;


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

    private static function validateUploadMedia($fileInfo, $platforms)
    {
        $isImage = false;
        $isVideo = false;

        if(strstr($fileInfo->getMIMEType(), 'image/')) $isImage = true;
        else if(strstr($fileInfo->getMIMEType(), 'video/')) $isVideo = true;

        $getID3 = new GetId3($fileInfo);
        // dd();
        foreach ($platforms as $platform) {
            switch (strtolower($platform)) {
                case 'facebook':
                    {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.facebook.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.facebook.image.max_size')) {
                                return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                                
                            }else {
                                return ['status'=>false, 'validation_msg'=>'Media Size not according to Facebook\'s requirements. Please check again.'];
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.facebook.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.facebook.video.max_size')) {
                                return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                            }else {
                                return ['status'=>false, 'validation_msg'=>'Media Size not according to Facebook\'s requirements. Please check again.'];
                            }
                        } else {
                            return ['status'=>false, 'validation_msg'=>'Media type not recognised by facebook. Please check again.'];
                        }
                    }
                    
                case 'instagram':
                    {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.instagram.image.max_size')) {
                                return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                            }else {
                                return ['status'=>false, 'validation_msg'=>'Media Size not according to Instagram\'s requirements. Please check again.'];
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.instagram.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.instagram.video.max_duration')) &&  ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.instagram.video.min_duration'))) {
                                    return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                                }else {
                                    return ['status'=>false, 'validation_msg'=>'Video\'s length is not according to Instagram requirements. Please check again.'];
                                }
                            }else {
                                return ['status'=>false, 'validation_msg'=>'Media Size not according to Facebook\'s requirements. Please check again.'];
                            }
                             
                        } return ['status'=>false, 'validation_msg'=>'Media type not recognised by Instagram. Please check again.'];
                        
                    }
                    
                case 'youtube':
                    {
                        if ($isImage) {
                            return ['status'=>false, 'validation_msg'=>'Image posting not allowed on Youtube. Please Select a video file or de-select youtube from platforms.'];
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.youtube.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.youtube.video.max_size')) {
                                return true;
                            }
                        } else {
                            return ['status'=>false, 'validation_msg'=>'Media type not recognised by Youtube. Please check again.'];
                        }
                    } 
                case 'twitter':
                    {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.twitter.image.max_size')) {
                                return true;
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.twitter.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.twitter.video.max_duration')) &&  ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.twitter.video.min_duration'))) {
                                    return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                                }else {
                                    return ['status'=>false, 'validation_msg'=>'Video\'s length is not according to Twitter requirements. Please check again.'];
                                }
                            }
                        } else {
                            return ['status'=>false, 'validation_msg'=>'Media type not recognised by Twitter. Please check again.'];
                        }
                    }
                case 'linkedin':
                    {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.linkedin.image.max_size')) {
                                return true;
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.linkedin.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.linkedin.video.max_duration')) &&  ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.linkedin.video.min_duration'))){
                                    return ['status'=>true, 'validation_msg'=>'Validated Successfully'];
                                }else {
                                    return ['status'=>false, 'validation_msg'=>'Video\'s length is not according to Linkedin requirements. Please check again.'];
                                }
                            }
                        } else {
                            return ['status'=>false, 'validation_msg'=>'Media type not recognised by Linkedin. Please check again.'];
                        }
                        break;
                    }    

                default: return ['status'=>false, 'validation_msg'=>'Something went wrong. Please check again.'];;
            }
        }        
    }

    public function uploadPostMedia(UploadPostMediaRequest $request)
    {
        $tags = '';
        if ($request->tags != '') {
            $tags = implode(' ', preg_filter('/^/', '#', explode(',', $request->tags)));
        }

        $platforms = TokenHelper::getFlippedPlatforms();

        if ($request->hasFile('post_media')) {
            
            $enabledPlatforms = [];
            foreach ($request->platform as $platform) {
                $enabledPlatforms[] = ucfirst($platforms[$platform]);
            }

            $fileMain = $request->file('post_media');
            $validation = (self::validateUploadMedia($fileMain, $enabledPlatforms));
            if (!$validation['status']) {
                return redirect()->back()->with('validation_error', $validation['validation_msg']);
            }
            $fileInfo = $request->file('post_media')->store('User');
            $mediaURL = encrypt($fileInfo);
            
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

<?php

namespace App\Http\Controllers\User\PostScheduler;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrActiveSocialAccount;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use App\Http\Requests\User\PostScheduler\UploadMediaRequest;
use App\Models\AyrUserProfile;
use App\Models\PostHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Owenoj\LaravelGetId3\GetId3;

class SchedulerController extends Controller
{
    public function index(Request $request)
    {
        $userProfiles = AyrUserProfile::where(['user_id' => Auth::id()])->get();
        if ($request->ajax() && $request->has('profile_key')) {
            try {
                $response = AyrshareController::getAyrActiveSocialAccounts(new AyrActiveSocialAccount(['profile_key' => decrypt($request->profile_key)]));
            } catch (DecryptException $e) {
                return abort(404);
            }

            return response()->json(collect($response), 200);
        }

        return view('user.post.scheduling', ['userProfiles' => $userProfiles]);
    }

    public function uploadPostMedia(UploadMediaRequest $request)
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

            foreach($validation as $val)
            {
                if (!$val['status']) {
                    return redirect()->back()->with('validation_error', $val['validation_msg']);
                }
            }
            $fileInfo = $request->file('post_media')->store('User');
            $mediaURL = encrypt($fileInfo);

            $userTags = [];
            foreach (explode(',', $request->mention) as $mentions) {
                array_push($userTags, ['username' => $mentions, 'x' => 1.0, 'y' => 1.0]);
            }

            // $scheduledData = Carbon::createFromFormat('Y-m-d H:i:s', $request->scheduleAt, 'UTC')->setTimezone('America/Los_Angeles') ?? false;
            $scheduledData = $request->scheduleAt.':00Z' ?? false;
            $data = $scheduledData ? ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'mediaUrls' => [route('image.displayImage', $mediaURL)],'scheduleDate' => [$scheduledData],'profile_key' => decrypt($request->profile_select)] : ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'mediaUrls' => [route('image.displayImage', $mediaURL)], 'profile_key' => decrypt($request->profile_select)];
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
            $postData->scheduledAt = $request->scheduleAt;
            $postData->postedBy = $request->postedBy;
            $postData->save();

        }

        return redirect()->back()->with('message2', 'Sucsessfully Posted!');
    }

    private static function validateUploadMedia($fileInfo, $platforms)
    {
        $isImage = false;
        $isVideo = false;

        if (strstr($fileInfo->getMIMEType(), 'image/')) {
            $isImage = true;
        } elseif (strstr($fileInfo->getMIMEType(), 'video/')) {
            $isVideo = true;
        }

        $getID3 = new GetId3($fileInfo);
        $retArr = [];
        foreach ($platforms as $platform) {
            switch (strtolower($platform)) {
                case 'facebook': {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.facebook.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.facebook.image.max_size')) {
                                $retArr[] =  [ 'platform'=>'facebook','status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else $retArr[] = ['platform'=>'facebook','status' => false, 'validation_msg' => 'Media Size not according to Facebook\'s requirements. Please check again.'];
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.facebook.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.facebook.video.max_size')) {
                                $retArr[] = ['platform'=>'facebook', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else $retArr[] = ['platform'=>'facebook', 'status' => false, 'validation_msg' => 'Video Size not according to Facebook\'s requirements. Please check again.'];
                        }else $retArr[] = ['platform'=>'facebook', 'status' => false, 'validation_msg' => 'Media type not recognised by facebook. Please check again.'];
                        break;
                    }
                case 'instagram': {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.instagram.image.max_size')) {
                                $retArr[] = ['platform'=>'instagram','status' => true, 'validation_msg' => 'Validated Successfully'];
                            }

                            else $retArr[] = ['platform'=>'instagram','status' => false, 'validation_msg' => 'Media Size not according to Instagram\'s requirements. Please check again.'];
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.instagram.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.instagram.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.instagram.video.min_duration'))) {
                                    $retArr[] = ['platform'=>'instagram','status' => true, 'validation_msg' => 'Validated Successfully'];
                                } else $retArr[] = ['platform'=>'instagram','status' => false, 'validation_msg' => 'Video\'s length is not according to Instagram requirements. Please check again.'];
                            } else $retArr[] = ['platform'=>'instagram','status' => false, 'validation_msg' => 'Media Size not according to Facebook\'s requirements. Please check again.'];
                        } else $retArr[] = ['platform'=>'instagram','status' => false, 'validation_msg' => 'Media type not recognised by Instagram. Please check again.'];
                        break;
                    }
                case 'youtube': {
                        if ($isImage) {
                            $retArr[] = ['platform'=>'youtube','status' => false, 'validation_msg' => 'Image posting not allowed on Youtube. Please Select a video file or de-select youtube from platforms.'];
                            break;
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.youtube.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.youtube.video.max_size')) {
                                $retArr[] = ['platform'=>'youtube','status' => true, 'validation_msg' => 'Validated Successfully'];
                            }
                            else $retArr[] = ['platform'=>'youtube','status' => false, 'validation_msg' => 'Media size not according to Youtube requirements. Please check again.'];
                        } else {
                            $retArr[] = ['platform'=>'youtube','status' => false, 'validation_msg' => 'Media type not recognised by Youtube. Please check again.'];
                        }
                        break;
                    }
                case 'twitter': {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.twitter.image.max_size')) {
                                $retArr[] = ['platform'=>'twitter','status' => true, 'validation_msg' => 'Validated Successfully'];
                            }else $retArr[] = ['platform'=>'twitter','status' => false, 'validation_msg' => 'Image size is not according to Twitter requirements. Please check again.'];
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.twitter.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.twitter.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.twitter.video.min_duration'))) {
                                    $retArr[] = ['platform'=>'twitter','status' => true, 'validation_msg' => 'Validated Successfully'];
                                }
                                else $retArr[] = ['platform'=>'twitter','status' => false, 'validation_msg' => 'Video\'s length is not according to Twitter requirements. Please check again.'];
                            }
                        } else {
                            $retArr[] = ['platform'=>'twitter','status' => false, 'validation_msg' => 'Media type not recognised by Twitter. Please check again.'];
                        }
                    }
                case 'linkedin': {
                        if (($isImage && in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.image.supported_types')))) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.linkedin.image.max_size')) {
                                $retArr[] = ['platform'=>'linkedin','status' => true, 'validation_msg' => 'Validated Successfully'];
                            }else $retArr[] = ['platform'=>'linkedin','status' => false, 'validation_msg' => 'Image size not according to Linkedin\'s requirements. Please check again.'];
                        } elseif ($isVideo && (in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.video.supported_types')))) {
                            if ($fileInfo->getSize() < config('social_media_restrictions.linkedin.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.linkedin.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.linkedin.video.min_duration'))) {
                                    $retArr[] = ['platform'=>'linkedin','status' => true, 'validation_msg' => 'Validated Successfully'];
                                }

                               else $retArr[] = ['platform'=>'linkedin','status' => false, 'validation_msg' => 'Video\'s length is not according to Linkedin requirements. Please check again.'];
                            }
                        } else {
                            $retArr[] = ['platform'=>'linkedin','status' => false, 'validation_msg' => 'Media type not recognised by Linkedin. Please check again.'];
                        }
                        break;
                    }
                default:
                    $retArr[] = ['status' => false, 'validation_msg' => 'Something went wrong. Please check again.'];
            }
            return $retArr;
        }
    }
}

<?php

namespace App\Http\Controllers\User\PostScheduler;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrActiveSocialAccount;
use App\Http\Requests\Api\Ayrshare\AyrSocialMediaPosts;
use App\Http\Requests\User\PostScheduler\UploadMediaRequest;
use App\Http\Requests\User\PostScheduler\ViewPostManagementRequest;
use App\Models\AyrUserProfile;
use App\Models\PostHistory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Owenoj\LaravelGetId3\GetId3;

class SchedulerController extends Controller
{
    public function index(ViewPostManagementRequest $request)
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
        // Getting tags from the view
        $tags = '';
        if ($request->tags != '') {
            $tags = implode(' ', preg_filter('/^/', '#', explode(',', $request->tags)));
        }

        //  Getting Platform name with the help of TokenHelper class.
        $platforms = TokenHelper::getFlippedPlatforms();
        $enabledPlatforms = [];
        foreach ($request->platform as $platform) {
            $enabledPlatforms[] = ucfirst($platforms[$platform]);
        }

        //  Getting user mentions from the view
        $userTags = [];
        foreach (explode(',', $request->mention) as $mentions) {
            array_push($userTags, ['username' => $mentions, 'x' => 1.0, 'y' => 1.0]);
        }

        // Getting Youtube Title
        $ytTitle = $request->yt_title;
        if (in_array('Youtube', $enabledPlatforms) && empty($ytTitle)) {
            return redirect()->back()->with('validation_error', 'Youtube Title is required for YouTube');
        }

        //  Getting schedule date and time to schedule the post
        $scheduledData = !empty($request->scheduled_at) ? $request->scheduled_at . ':00Z' : false;

        // Check if request has post media or not. If present check for the post type (scheduled or unscheduled).
        // Check for platforms where post media is required
        if ($request->hasFile('post_media')) {
            $fileMain = $request->file('post_media');
            $validation = (self::validateUploadMedia($fileMain, $enabledPlatforms));
            foreach ($validation as $val) {
                if (!$val['status']) {
                    return redirect()->back()->with('validation_error', $val['validation_msg']);
                }
            }
            $mediaURL = $request->file('post_media')->store('User');
            $splittedMediaUrl = explode('/', $mediaURL);
            $data = $scheduledData ? ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'mediaUrls' => [route('media.displayMedia', [$splittedMediaUrl[0], $splittedMediaUrl[1]])], 'scheduleDate' => $scheduledData, 'profile_key' => decrypt($request->profile_select)] : ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'mediaUrls' => [route('media.displayMedia', [$splittedMediaUrl[0], $splittedMediaUrl[1]])], 'profile_key' => decrypt($request->profile_select)];
            if (in_array('Youtube', $enabledPlatforms)) {
                $data['youTubeOptions'] = ['title' => $ytTitle, 'youTubeVisibility' => $request->yt_visibility];
            }
        } elseif (in_array('Instagram', $enabledPlatforms) || in_array('Youtube', $enabledPlatforms) || in_array('Pinterest', $enabledPlatforms)) {
            return redirect()->back()->with('validation_error', 'Selected Platform(s) require to have Image/Video.');
        } else {
            $data = $scheduledData ? ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'scheduleDate' => $scheduledData, 'profile_key' => decrypt($request->profile_select)] : ['post' => $request->caption . ' ' . $tags, 'platforms' => $enabledPlatforms, 'profile_key' => decrypt($request->profile_select)];
        }

        // Storing the API response
        $response = (new AyrshareController())->ayrSocialMediaPosts(new AyrSocialMediaPosts($data));

        // Storing response data to DB
        $user = Auth::user();
        $postData = new PostHistory();
        $postData->user_id = $user->id;
        $postData->profile_key = decrypt($request->profile_select);
        $post_info = $postData->post_info;

        if (is_null($post_info)) {
            $post_info = [];
        }

        if (!empty($request->scheduled_at)) {
            $postData->caption = $request->caption . ' ' . $tags;
            $postData->media_url = [route('media.displayMedia', [$splittedMediaUrl[0], $splittedMediaUrl[1]])];
            $postData->is_scheduled = 1; //Scheduled
            $postData->ayrId = $response['id'];
            $postData->scheduled_at = $request->scheduled_at;
            $postData->posted_by = $request->posted_by;
            $postData->ayrStatus = $response['status'];
            $postData->save();

            return redirect()->back()->with('message2', 'Post Successfully Scheduled!');
        }
        foreach ($response['postIds'] as $post) {
            $post_info[] = $post;
        }

        $postData->post_info = $post_info;
        $postData->caption = $request->caption . ' ' . $tags;
        $postData->media_url = [route('media.displayMedia', [$splittedMediaUrl[0], $splittedMediaUrl[1]])];
        $postData->is_scheduled = 0; //Posted
        $postData->ayrId = $response['id'];
        $postData->ayrRefId = $response['refId'];
        $postData->posted_by = $request->posted_by;
        $postData->save();

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
                            if ($fileInfo->getSize() <= config('social_media_restrictions.facebook.image.max_size')) {
                                $retArr[] = ['platform' => 'facebook', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'facebook', 'status' => false, 'validation_msg' => 'Media Size not according to Facebook\'s requirements. Please check again.'];
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.facebook.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.facebook.video.max_size')) {
                                $retArr[] = ['platform' => 'facebook', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'facebook', 'status' => false, 'validation_msg' => 'Video Size not according to Facebook\'s requirements. Please check again.'];
                            }
                        } else {
                            $retArr[] = ['platform' => 'facebook', 'status' => false, 'validation_msg' => 'Media type not recognised by facebook. Please check again.'];
                        }
                        break;
                    }
                case 'instagram': {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.instagram.image.max_size')) {
                                $retArr[] = ['platform' => 'instagram', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'instagram', 'status' => false, 'validation_msg' => 'Media Size not according to Instagram\'s requirements. Please check again.'];
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.instagram.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.instagram.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.instagram.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.instagram.video.min_duration'))) {
                                    $retArr[] = ['platform' => 'instagram', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                                } else {
                                    $retArr[] = ['platform' => 'instagram', 'status' => false, 'validation_msg' => 'Video\'s length is not according to Instagram requirements. Please check again.'];
                                }
                            } else {
                                $retArr[] = ['platform' => 'instagram', 'status' => false, 'validation_msg' => 'Media Size not according to Instagram\'s requirements. Please check again.'];
                            }
                        } else {
                            $retArr[] = ['platform' => 'instagram', 'status' => false, 'validation_msg' => 'Media type not recognised by Instagram. Please check again.'];
                        }
                        break;
                    }
                case 'youtube': {
                        if ($isImage) {
                            $retArr[] = ['platform' => 'youtube', 'status' => false, 'validation_msg' => 'Image posting not allowed on Youtube. Please Select a video file or de-select youtube from platforms.'];
                            break;
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.youtube.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.youtube.video.max_size')) {
                                $retArr[] = ['platform' => 'youtube', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'youtube', 'status' => false, 'validation_msg' => 'Media size not according to Youtube requirements. Please check again.'];
                            }
                        } else {
                            $retArr[] = ['platform' => 'youtube', 'status' => false, 'validation_msg' => 'Media type not recognised by Youtube. Please check again.'];
                        }
                        break;
                    }
                case 'twitter': {
                        if ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.image.supported_types')) && $isImage)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.twitter.image.max_size')) {
                                $retArr[] = ['platform' => 'twitter', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'twitter', 'status' => false, 'validation_msg' => 'Image size is not according to Twitter requirements. Please check again.'];
                            }
                        } elseif ((in_array($fileInfo->getMIMEType(), config('social_media_restrictions.twitter.video.supported_types')) && $isVideo)) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.twitter.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.twitter.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.twitter.video.min_duration'))) {
                                    $retArr[] = ['platform' => 'twitter', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                                } else {
                                    $retArr[] = ['platform' => 'twitter', 'status' => false, 'validation_msg' => 'Video\'s length is not according to Twitter requirements. Please check again.'];
                                }
                            }
                        } else {
                            $retArr[] = ['platform' => 'twitter', 'status' => false, 'validation_msg' => 'Media type not recognised by Twitter. Please check again.'];
                        }
                    }
                case 'linkedin': {
                        if (($isImage && in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.image.supported_types')))) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.linkedin.image.max_size')) {
                                $retArr[] = ['platform' => 'linkedin', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                            } else {
                                $retArr[] = ['platform' => 'linkedin', 'status' => false, 'validation_msg' => 'Image size not according to Linkedin\'s requirements. Please check again.'];
                            }
                        } elseif ($isVideo && (in_array($fileInfo->getMIMEType(), config('social_media_restrictions.linkedin.video.supported_types')))) {
                            if ($fileInfo->getSize() <= config('social_media_restrictions.linkedin.video.max_size')) {
                                if (($getID3->getPlaytimeSeconds() <= config('social_media_restrictions.linkedin.video.max_duration')) && ($getID3->getPlaytimeSeconds() >= config('social_media_restrictions.linkedin.video.min_duration'))) {
                                    $retArr[] = ['platform' => 'linkedin', 'status' => true, 'validation_msg' => 'Validated Successfully'];
                                } else {
                                    $retArr[] = ['platform' => 'linkedin', 'status' => false, 'validation_msg' => 'Video\'s length is not according to Linkedin requirements. Please check again.'];
                                }
                            }
                        } else {
                            $retArr[] = ['platform' => 'linkedin', 'status' => false, 'validation_msg' => 'Media type not recognised by Linkedin. Please check again.'];
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

<?php

namespace App\Http\Controllers\User\Post_Scheduling;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Post_Scheduling\UploadPostMediaRequest;
use Illuminate\Http\Request;

class PostSchedulingController extends Controller
{
    function index()
    {
        return view('user.post_scheduling.post_scheduling_main');
    }

    public function uploadPostMedia(UploadPostMediaRequest $request)
    {
        if($request->hasFile('post_media'))
        {
            $fileInfo = $request->file('post_media')->store('User');

        }
        return redirect()->back()->with('message2', 'Post Updated!');
    }
}

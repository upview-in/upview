<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function videos(Request $request)
    {
        return view('user.analyze.youtube.videos');
    }
}

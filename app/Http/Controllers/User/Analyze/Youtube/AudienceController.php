<?php

namespace App\Http\Controllers\User\Analyze\Youtube;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AudienceController extends Controller
{
    public function audience(Request $request)
    {
        return view('user.analyze.youtube.audience');
    }
}

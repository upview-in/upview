<?php

namespace App\Http\Controllers\User\Analyze\YouTube;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Analyze\YouTube\ViewAudienceRequest;

class AudienceController extends Controller
{
    public function audience(ViewAudienceRequest $request)
    {
        return view('user.analyze.youtube.audience');
    }
}

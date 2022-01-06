<?php

namespace App\Http\Controllers\User\Ayrshare;

use App\Http\Controllers\Controller;
use App\Models\AyrUserProfile;
use Illuminate\Support\Facades\Auth;

class AyrProfileController extends Controller
{
    public function index()
    {
        $userProfiles = AyrUserProfile::where(['user_id' => Auth::id()])->get();

        return view('user.profile_manage', ['userProfiles'=>$userProfiles]);
    }
}

<?php

namespace App\Http\Controllers\User\Ayrshare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AyrProfileController extends Controller
{
    function index()
    {
        $userProfiles = Auth::user()->profiles ?? [];
        return view('user.profile_manage', ['userProfiles'=>$userProfiles]);
    }


}

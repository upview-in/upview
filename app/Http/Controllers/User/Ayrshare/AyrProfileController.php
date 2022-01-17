<?php

namespace App\Http\Controllers\User\Ayrshare;

use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Ayrshare\AyrActiveSocialAccount;
use App\Models\AyrUserProfile;
use Illuminate\Support\Facades\Auth;

class AyrProfileController extends Controller
{
    public function index()
    {
        $userProfiles = AyrUserProfile::where(['user_id' => Auth::id()])->get();
        
        $temp = [];
        $platforms = [];
        foreach ($userProfiles as $profiles) {
            $platforms[] = array_merge($temp, (new AyrshareController())->getAyrActiveSocialAccounts(new AyrActiveSocialAccount(['profile_key'=>$profiles['profile_key']])));
        }

        return view('user.profile_manage', ['userProfiles'=>$userProfiles, 'linked_platforms'=>$platforms]);
    }
}

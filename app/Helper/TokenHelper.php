<?php

namespace App\Helper;

use App\Models\LinkedAccounts;
use Illuminate\Support\Facades\Auth;

class TokenHelper
{
    public static $PLATFORMS = [
        'youtube' => 1,
        'facebook' => 2,
        'instagram' => 3,
        'twitter' => 4,
        'pintrest' => 5,
        'linkedin' => 6
    ];

    public static function getFlippedPlatforms() : array
    {
        return array_flip(self::$PLATFORMS);
    }

    public static function getAuthToken_YT()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$PLATFORMS['youtube']])->get();
    }

    public static function getAuthToken_FB()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$PLATFORMS['facebook']])->get();
    }

    public static function getAuthToken_IG()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$PLATFORMS['instagram']])->get();
    }
}

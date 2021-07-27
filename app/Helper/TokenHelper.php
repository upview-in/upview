<?php

namespace App\Helper;

use App\Models\LinkedAccounts;
use Illuminate\Support\Facades\Auth;

class TokenHelper
{
    public static $YOUTUBE = 1;
    public static $FACEBOOK = 2;
    public static $INSTAGRAM = 3;

    public static function getAuthToken_YT()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$YOUTUBE])->get();
    }

    public static function getAuthToken_FB()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$FACEBOOK])->get();
    }

    public static function getAuthToken_IG()
    {
        $user_id = Auth::id();
        return LinkedAccounts::where(['user_id' => $user_id, 'platform' => self::$INSTAGRAM])->get();
    }
}

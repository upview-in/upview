<?php

namespace App\Http\Controllers\User;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Facebook\FacebookController;
use App\Http\Controllers\Api\Instagram\InstagramController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function setSessionDefaultPage(Request $request)
    {
        if ($request->has(['id', 'platform'])) {
            if ($request->platform == TokenHelper::$FACEBOOK) {
                $sKey = 'PagesIndex_FB';
                $accessCode = FacebookController::getFacebookPageData();
            } /*else if ($request->platform == TokenHelper::$INSTAGRAM) {*/
            //     $sKey = "PagesIndex_IG";
            //     $accessCode = InstagramController::getInstagramPageData();
            // }
            foreach ($accessCode as $index => $_) {
                if ($_['id'] == $request->id) {
                    $pagesIndex = $index;
                }
            }

            if (isset($pagesIndex)) {
                session()->put($sKey, $pagesIndex);
            }
        }
    }
}

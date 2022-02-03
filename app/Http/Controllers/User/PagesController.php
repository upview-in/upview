<?php

namespace App\Http\Controllers\User;

use App\Helper\TokenHelper;
use App\Http\Controllers\Api\Facebook\FacebookController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function setSessionDefaultPage(Request $request)
    {
        if ($request->has(['id', 'platform'])) {
            if ($request->platform == TokenHelper::$PLATFORMS['facebook']) {
                $sKey = 'PagesIndex_FB';
                $accessCode = FacebookController::getFacebookPageData();
            }

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

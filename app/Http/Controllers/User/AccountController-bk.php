<?php

namespace App\Http\Controllers\User;

use App\Helper\FacebookHelper;
use App\Helper\InstagramHelper;
use App\Helper\TokenHelper;
use App\Helper\YoutubeHelper;
use App\Http\Controllers\Controller;
use App\Models\LinkedAccounts;
use Google\Service\Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getYoutubeAccess()
    {
        $yt = new YoutubeHelper();
        $client = $yt->getGoogleClient();
        $client->setPrompt('select_account');
        $auth_url = $client->createAuthUrl();
        return redirect(filter_var($auth_url, FILTER_SANITIZE_URL));
    }

    public function getFacebookAccess()
    {
        $fb = new FacebookHelper();
        $client = $fb->getFacebookClient();
        $redirectHelper = $client->getRedirectLoginHelper();
        $permissions = [
            'email',
            'public_profile',
            'pages_show_list',
            'pages_manage_ads',
            'pages_manage_metadata',
            'pages_manage_engagement',
            'pages_read_user_content',
            'ads_management',
            'business_management',
            'pages_read_engagement'
        ];
        $loginUrl = $redirectHelper->getLoginUrl(route(config('facebook.redirectUrl')), $permissions);
        return redirect(filter_var($loginUrl, FILTER_SANITIZE_URL));
    }

    public function getInstagramAccess()
    {
        $fb = new FacebookHelper();
        $client = $fb->getFacebookClient();
        $redirectHelper = $client->getRedirectLoginHelper();
        $permissions = [
            'email',
            'instagram_basic',
            'instagram_content_publish',
            'instagram_manage_comments',
            'instagram_manage_insights',
        ];
        $loginUrl = $redirectHelper->getLoginUrl(route(config('instagram.redirectUrl')), $permissions);
        return redirect(filter_var($loginUrl, FILTER_SANITIZE_URL));
    }

    public function addYoutubeAccount(Request $request)
    {
        $rr = redirect()->route('panel.user.account.accounts_manager');
        if ($request->has('code', 'scope')) {
            $yt = new YoutubeHelper();
            $client = $yt->getGoogleClient();
            $token = $client->fetchAccessTokenWithAuthCode($request->code);
            if (isset($token['refresh_token'])) {
                $oauth = new Oauth2($client);
                $auth_user_info = $oauth->userinfo->get();

                $__ = LinkedAccounts::where(['user_id' => Auth::id(), 'platform' => 1, 'email' => $auth_user_info['email']]);
                if ($__->count() !== 1) {
                    $linkedAccount = new LinkedAccounts();
                    $linkedAccount->user_id = Auth::id();
                    $linkedAccount->email = $auth_user_info['email'] ?? '';
                    $linkedAccount->name = $auth_user_info['name'] ?? '';
                    $linkedAccount->picture = $auth_user_info['picture'] ?? '';
                    $linkedAccount->code = $request->code;
                    $linkedAccount->access_token = $token['access_token'];
                    $linkedAccount->refresh_token = $token['refresh_token'];
                    $linkedAccount->expire_in = $token['expires_in'];
                    $linkedAccount->created = $token['created'];
                    $linkedAccount->platform = 1;
                    $linkedAccount->save();
                    $rr->with('linked', 'true');
                } else {
                    $rr->with('already_linked', 'true');
                }
            } else {
                $rr->with('error', 'true');
            }
        } else {
            $rr->with('error', 'true');
        }

        return $rr;
    }

    public function addFacebookAccount(Request $request)
    {
        $rr = redirect()->route('panel.user.account.accounts_manager');
        if ($request->has('code', 'state')) {
            $fb = new FacebookHelper();
            $client = $fb->getFacebookClient();
            $redirectHelper = $client->getRedirectLoginHelper();
            $accessToken = $redirectHelper->getAccessToken();
            $oAuth2Client = $client->getOAuth2Client();
            $longLiveAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

            $fbUser = $client->get('/me?fields=name,email,picture', $longLiveAccessToken->getValue())->getGraphUser();
            if (isset($fbUser['name'], $fbUser['email'], $fbUser['picture'])) {
                $__ = LinkedAccounts::where(['user_id' => Auth::id(), 'platform' => 2, 'email' => $fbUser['email']]);
                if ($__->count() !== 1) {
                    $linkedAccount = new LinkedAccounts();
                    $linkedAccount->user_id = Auth::id();
                    $linkedAccount->fb_id = $fbUser['id'] ?? '';
                    $linkedAccount->email = $fbUser['email'] ?? '';
                    $linkedAccount->name = $fbUser['name'] ?? '';
                    $linkedAccount->picture = $fbUser['picture']['url'] ?? '';
                    $linkedAccount->access_token = $longLiveAccessToken->getValue();
                    $linkedAccount->expire_in = $longLiveAccessToken->getExpiresAt()->getTimestamp();
                    $linkedAccount->platform = 2;
                    $linkedAccount->save();
                    $rr->with('linked', 'true');
                } else {
                    $_ = $__->first();
                    if (time() > $_->expire_in) {
                        $_->update([
                            'fb_id' => $fbUser['id'] ?? '',
                            'email' => $fbUser['email'] ?? '',
                            'name' => $fbUser['name'] ?? '',
                            'picture' => $fbUser['picture']['url'] ?? '',
                            'access_token' => $longLiveAccessToken->getValue(),
                            'expire_in' => $longLiveAccessToken->getExpiresAt()->getTimestamp(),
                        ]);
                        $rr->with('renewed', 'true');
                    } else {
                        $rr->with('already_linked', 'true');
                    }
                    $rr->with('renewed', 'true');
                }
            } else {
                $rr->with('retry', 'true');
            }
        } else {
            $rr->with('error', 'true');
        }
        return $rr;
    }

    public function addInstagramAccount(Request $request)
    {
        $rr = redirect()->route('panel.user.account.accounts_manager');
        if ($request->has('code', 'state')) {
            $fb = new InstagramHelper();
            $client = $fb->getInstagramClient();
            $redirectHelper = $client->getRedirectLoginHelper();
            $accessToken = $redirectHelper->getAccessToken();
            $oAuth2Client = $client->getOAuth2Client();
            $longLiveAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            $fbUser = $client->get('/me?fields=name,email,picture', $longLiveAccessToken->getValue())->getGraphUser();
            if (isset($fbUser['name'], $fbUser['email'], $fbUser['picture'])) {
                $__ = LinkedAccounts::where(['user_id' => Auth::id(), 'platform' => 3, 'email' => $fbUser['email']]);
                if ($__->count() !== 1) {
                    $linkedAccount = new LinkedAccounts();
                    $linkedAccount->user_id = Auth::id();
                    $linkedAccount->fb_id = $fbUser['id'] ?? '';
                    $linkedAccount->email = $fbUser['email'] ?? '';
                    $linkedAccount->name = $fbUser['name'] ?? '';
                    $linkedAccount->picture = $fbUser['picture']['url'] ?? '';
                    $linkedAccount->access_token = $longLiveAccessToken->getValue();
                    dd($longLiveAccessToken);
                    $linkedAccount->expire_in = $longLiveAccessToken->getExpiresAt()->getTimestamp();
                    $linkedAccount->platform = 3;
                    $linkedAccount->save();
                    $rr->with('linked', 'true');
                } else {
                    $_ = $__->first();
                    if (time() > $_->expire_in) {
                        $_->update([
                            'fb_id' => $fbUser['id'] ?? '',
                            'email' => $fbUser['email'] ?? '',
                            'name' => $fbUser['name'] ?? '',
                            'picture' => $fbUser['picture']['url'] ?? '',
                            'access_token' => $longLiveAccessToken->getValue(),
                            'expire_in' => $longLiveAccessToken->getExpiresAt()->getTimestamp(),
                        ]);
                        $rr->with('renewed', 'true');
                    } else {
                        $rr->with('already_linked', 'true');
                    }
                    $rr->with('renewed', 'true');
                }
            } else {
                $rr->with('retry', 'true');
            }
        } else {
            $rr->with('error', 'true');
        }
        return $rr;
    }

    public function unlinkAccount(Request $request, $id)
    {
        $acc = LinkedAccounts::find($id);
        if (!is_null($acc) && $acc->user_id === Auth::id()) {
            $acc->delete();
        }
        return redirect()->back()->with('unlink', 'true');
    }

    public function setDefaultAccount(Request $request, $id, $platform)
    {
        $acc = LinkedAccounts::find($id);
        if (!is_null($acc) && $acc->user_id === Auth::id()) {
            LinkedAccounts::where(['platform' => (int)$platform, 'user_id' => Auth::id()])->update(['default' => false]);
            $acc->default = true;
            $acc->update();
        }
        return redirect()->back()->with('default', 'true');
    }

    public function setSessionDefaultAccount(Request $request)
    {
        if ($request->has(['id'])) {
            $acc = LinkedAccounts::find($request->id);
            if (!is_null($acc) && $acc->user_id === Auth::id()) {
                $accessCode = TokenHelper::getAuthToken_YT();
                foreach ($accessCode as $index => $_) {
                    if ($_->id == $request->id) {
                        $accountIndex = $index;
                    }
                }
                if (isset($accountIndex)) {
                    session()->put('AccountIndex', $accountIndex);
                }
            }
        }
    }
}

?>

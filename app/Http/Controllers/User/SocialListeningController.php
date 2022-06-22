<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialListeningController extends Controller
{
    public function index()
    {
        if (empty(Auth::user()->awario_profile_hash)) {
            return abort(404);
        }
        $hash = sha1(rand());
        session(['validate_url_hash' => $hash]);

        return view('user.social_listening', ['hash' => encrypt($hash)]);
    }

    public function load(Request $request, $hash)
    {
        try {
            $hash = decrypt($hash);
        } catch (DecryptException $e) {
            return abort(404);
        }

        $rey_hash = session('validate_url_hash', null);

        if (!empty($rey_hash) && $rey_hash === $hash) {
            session()->forget('validate_url_hash');

            return redirect('https://app.awario.com/#/login-by-hash/' . Auth::user()->awario_profile_hash);
        }

        return abort(404);
    }
}

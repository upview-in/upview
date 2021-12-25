<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ChangeAddressRequest;
use App\Http\Requests\User\Profile\ChangeAvatarRequest;
use App\Http\Requests\User\Profile\ChangeBasicProfileRequest;
use App\Http\Requests\User\Profile\ChangePasswordRequest;
use App\Models\LinkedAccounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function changeBasicProfile(ChangeBasicProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->mobile_number = $request->mobile_number ?? $user->mobile_number;
        $user->birth_date = $request->birth_date ?? $user->birth_date;
        $user->local_lang = $request->local_lang ?? $user->local_lang;
        $user->update();

        return redirect()->back()->withInput()->with('message', 'Profile updated!');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->update();
        Auth::logout();

        return redirect()->route('login');
    }

    public function changeAddress(ChangeAddressRequest $request)
    {
        $user = Auth::user();
        $user->country = $request->country ?? $user->country;
        $user->state = $request->state ?? $user->state;
        $user->city = $request->city ?? $user->city;
        $user->address = $request->address ?? $user->address;
        $user->update();

        return redirect()->back()->withInput()->with('message1', 'Address updated!');
    }

    public function changeAvatar(ChangeAvatarRequest $request)
    {
        $user = Auth::user();
        if ($user->hasMedia('avatars')) {
            $user->media()->delete();
        }
        $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        $user->update();

        return redirect()->back()->with('message2', 'Avatar updated!');
    }

    public function accountsManager()
    {
        $linkedAccounts = LinkedAccounts::where(['user_id' => Auth::id()])->get();

        return view('user.account_manage', ['linkedAccounts' => $linkedAccounts]);
    }
}

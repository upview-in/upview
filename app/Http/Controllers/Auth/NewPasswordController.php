<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (!empty(session('password_reset_is_otp_valid'))
            && !empty(session('password_reset_expired_at'))
            && Carbon::parse(session('password_reset_expired_at'))->gte(Carbon::now())
            && (!empty(session('password_reset_mobile_number'))
                || !empty(session('password_reset_email')))
            ) {
            return view('auth.reset-password', ['request' => $request]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(Request $request)
    {
        $input_data = $request->validate([
            'password_reset_email' => ['required_without:password_reset_mobile_number', 'nullable', 'email'],
            'password_reset_mobile_number' => ['required_without:password_reset_email', 'nullable', 'phone:AUTO'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        if (!empty(session('password_reset_is_otp_valid'))
            && !empty(session('password_reset_expired_at'))
            && Carbon::parse(session('password_reset_expired_at'))->gte(Carbon::now())
            && (!empty(session('password_reset_mobile_number'))
                || !empty('password_reset_email'))
            && (session('password_reset_mobile_number') === $input_data['password_reset_mobile_number']
                || session('password_reset_email') === $input_data['password_reset_email'])
            ) {
            if (!empty($input_data['password_reset_mobile_number'])) {
                $user = User::where('mobile_number', $input_data['password_reset_mobile_number'])->first();
            } else {
                $user = User::where('email', $input_data['password_reset_email'])->first();
            }

            if (!empty($user)) {
                $user->forceFill([
                    'password' => Hash::make($input_data['password']),
                    'remember_token' => Str::random(60),
                ])->save();

                return redirect()->route('login')->with(['message' => 'Password reset successfully.']);
            }

            return redirect()->route('login')->with(['message' => 'Invalid request!']);
        }

        return redirect()->route('login')->with(['message' => 'Session Expired!']);
    }
}

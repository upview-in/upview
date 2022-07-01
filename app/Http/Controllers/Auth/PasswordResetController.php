<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SMSGatewayController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Display the password reset  request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function check(Request $request)
    {
        $data = $request->validate([
            'otp' => ['required', 'string', 'size:6'],
            'email' => ['required_without:mobile_number', 'nullable', 'email'],
            'mobile_number' => ['required_without:email', 'nullable', 'phone:AUTO'],
        ]);

        if (!empty(session('password_reset_otp_timeout'))) {
            return redirect()->back()->withErrors(['otp' => 'Maximum attempts reached! Try after sometime.']);
        }

        if (session('password_reset_wrong_otp_entered', 1) > 3) {
            session()->forget([
                'password_reset_user_otp',
                'password_reset_user_otp_sended_time',
                'password_reset_user_can_resend_otp_in',
                'password_reset_wrong_otp_entered',
            ]);

            session(['password_reset_otp_timeout' => Carbon::now()->addMinutes(10)]);

            return redirect()->back()->withErrors(['otp' => 'Maximum attempts reached! Try after sometime.']);
        }

        if (Carbon::parse(session('password_reset_user_otp_sended_time'))->addMinutes(10)->lte(Carbon::now())) {
            $this->send($request);

            session()->forget([
                'password_reset_user_otp',
                'password_reset_user_otp_sended_time',
                'password_reset_user_can_resend_otp_in',
                'password_reset_wrong_otp_entered',
            ]);

            return [
                'error' => true,
                'message' => 'OTP is expired! New OTP generated successfully.',
            ];
        }

        if (intval($data['otp']) === session('password_reset_user_otp')) {
            session([
                'password_reset_email' => $data['email'],
                'password_reset_mobile_number' => $data['mobile_number'],
                'password_reset_is_otp_valid' => true,
                'password_reset_expired_at' => Carbon::now()->addMinutes(10),
            ]);

            session()->forget([
                'password_reset_user_otp',
                'password_reset_user_otp_sended_time',
                'password_reset_user_can_resend_otp_in',
            ]);

            return [
                'redirect' => true,
                'redirect_to' => route('password.reset'),
            ];
        }
        session(['password_reset_wrong_otp_entered' => session('password_reset_wrong_otp_entered', 1) + 1]);

        return [
            'error' => true,
            'message' => 'Invalid OTP. ' . (4 - session('password_reset_wrong_otp_entered', 1)) . ' attempts left.',
        ];
    }

    public function send(Request $request)
    {
        $input_data = $request->validate([
            'email' => ['required_without:mobile_number', 'nullable', 'email'],
            'mobile_number' => ['required_without:email', 'nullable', 'phone:AUTO'],
        ]);

        if (!empty($input_data['mobile_number']) && !User::where('mobile_number', $input_data['mobile_number'])->exists()) {
            return [
                'code' => 1,
                'success' => false,
                'message' => 'Entered mobile number is not exists.',
            ];
        }

        if (!empty($input_data['email']) && !User::where('email', $input_data['email'])->exists()) {
            return [
                'code' => 1,
                'success' => false,
                'message' => 'Entered email address is not exists.',
            ];
        }

        if (!empty(session('password_reset_otp_timeout')) && Carbon::parse(session('password_reset_otp_timeout'))->gte(Carbon::now())) {
            return [
                'success' => false,
                'message' => 'Try after 10 mins.',
            ];
        }

        session()->forget('password_reset_otp_timeout');

        if (is_null(session('password_reset_user_otp_sended_time')) || Carbon::now()->gte(Carbon::parse(session('password_reset_user_otp_sended_time'))->addMinutes(session('password_reset_user_can_resend_otp_in', 1)))) {
            $otp = random_int(100000, 999999);

            if (!empty($input_data['mobile_number'])) {
                $formatted_number = Str::replace('+', '', $input_data['mobile_number']);
                (new SMSGatewayController())->sendSMS([$formatted_number], $otp . ' is the OTP for your password reset on UPVIEW. if you didn\'t initiate you can safely ignore this message and report at support@upview.in', 'reset_password_otp');
            } else {
                return [
                    'success' => true,
                    'message' => 'Email is under development',
                ];
            }

            session([
                'password_reset_user_otp' => $otp,
                'password_reset_user_otp_sended_time' => Carbon::now(),
                'password_reset_user_can_resend_otp_in' => (session('password_reset_user_can_resend_otp_in', 1) * 2),
            ]);
        } else {
            return [
                'success' => false,
                'message' => 'You can resend OTP after ' . Carbon::parse(session('password_reset_user_otp_sended_time'))->addMinutes(session('password_reset_user_can_resend_otp_in', 1))->diffForHumans() . '.',
            ];
        }

        return [
            'success' => true,
            'message' => 'OTP sent!',
        ];
    }
}

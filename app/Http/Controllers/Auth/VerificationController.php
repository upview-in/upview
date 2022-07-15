<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailGatewayController;
use App\Http\Controllers\SMSGatewayController;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verification');
    }

    public function check(Request $request)
    {
        $data = $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        if (!empty(session('otp_timeout'))) {
            return redirect()->back()->withErrors(['otp' => 'Maximum attempts reached! Try after sometime.']);
        }

        if (session('wrong_otp_entered', 1) > 3) {
            session()->forget([
                'user_otp',
                'user_otp_sended_time',
                'user_can_resend_otp_in',
                'wrong_otp_entered',
            ]);

            session(['otp_timeout' => Carbon::now()->addMinutes(10)]);

            return redirect()->back()->withErrors(['otp' => 'Maximum attempts reached! Try after sometime.']);
        }

        if (Carbon::parse(session('user_otp_sended_time'))->addMinutes(10)->lte(Carbon::now())) {
            $this->send();

            session()->forget([
                'user_otp',
                'user_otp_sended_time',
                'user_can_resend_otp_in',
                'wrong_otp_entered',
            ]);

            return redirect()->back()->withErrors(['otp' => 'OTP is expired! New OTP generated successfully.']);
        }

        if (intval($data['otp']) === session('user_otp')) {
            $user = appUser();
            $user->verified_at = Carbon::now();
            $user->save();

            session()->forget([
                'user_otp',
                'user_otp_sended_time',
                'user_can_resend_otp_in',
            ]);

            $formatted_number = Str::replace('+', '', appUser()->mobile_number);
            $trial_plan = UserRole::getTrialPlan();

            (new SMSGatewayController())->sendSMS([$formatted_number], 'Welcome, ' . appUser()->name . ' to UPVIEW. Visit upview.in and login now to enjoy your personal ' . $trial_plan->plan_validity . ' day trial to our services.', 'welcome_message');
            (new SMSGatewayController())->sendSMS(['917990719157'], "Alert! New use registered on UPVIEW.\nID - " . $user->id . "\nName - " . $user->name . "\nEmail - " . $user->email . "\nMobile - " . $user->mobile_number, 'new_user_registered_alert_to_admin');
            (new EmailGatewayController)->sendMailWithDefault(appUser()->email, [], 'welcome');

            return redirect()->to(RouteServiceProvider::HOME);
        }
        session(['wrong_otp_entered' => session('wrong_otp_entered', 1) + 1]);

        return redirect()->back()->withErrors(['otp' => 'Invalid OTP. ' . (4 - session('wrong_otp_entered', 1)) . ' attempts left.']);
    }

    public function send()
    {
        $otp = random_int(100000, 999999);
        $formatted_number = Str::replace('+', '', appUser()->mobile_number);

        if (!empty(session('otp_timeout')) && Carbon::parse(session('otp_timeout'))->gte(Carbon::now())) {
            return [
                'success' => false,
                'message' => 'Try after 10 mins.',
            ];
        }

        session()->forget('otp_timeout');

        if (is_null(session('user_otp_sended_time')) || Carbon::now()->gte(Carbon::parse(session('user_otp_sended_time'))->addMinutes(session('user_can_resend_otp_in', 1)))) {
            (new SMSGatewayController())->sendSMS([$formatted_number], $otp . ' is your OTP for Registration in UPVIEW. OTP valid for 10 mins.', 'registration_otp');
            (new EmailGatewayController)->sendMailWithDefault(appUser()->email, ['otp' => $otp], 'registration_otp');

            session([
                'user_otp' => $otp,
                'user_otp_sended_time' => Carbon::now(),
                'user_can_resend_otp_in' => (session('user_can_resend_otp_in', 1) * 2),
            ]);
        } else {
            return [
                'success' => false,
                'message' => 'You can resend OTP after ' . Carbon::parse(session('user_otp_sended_time'))->addMinutes(session('user_can_resend_otp_in', 1))->diffForHumans() . '.',
            ];
        }

        return [
            'success' => true,
            'message' => 'OTP sent!',
        ];
    }
}

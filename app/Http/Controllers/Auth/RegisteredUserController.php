<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailGatewayController;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            'mobile_number' => ['required', 'phone:AUTO'],
            'country' => ['required', 'exists:countries,_id'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'companyName' => $request->companyName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' =>  $request->mobile_number,
            'country' => $request->country,
        ]);

        // Add free plan to new registered user
        $trial_plan = UserRole::getTrialPlan();

        if (!empty($trial_plan)) {
            $order = new UserOrder();
            $order->payment_gateway_using = 0;
            $order->user_id = $user->id;
            $order->plan_id = $trial_plan->id;
            $order->status = 1;
            $order->payment_id = '0';
            $order->purchased_at = Carbon::now();
            $order->expired_at = Carbon::now()->addDays($trial_plan->plan_validity);
            $order->response_message = 'Free plan added successfully.';
            $order->save();

            $user->roles()->attach([$trial_plan->id]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

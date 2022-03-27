<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Plans\DetailRequest;
use App\Models\UserRole;

class PlansController extends Controller
{
    public function list()
    {
        $plans = UserRole::enabled()->get();

        return view('user.plans.list', ['plans' => $plans]);
    }

    public function details(DetailRequest $request, UserRole $plan)
    {
        return view('user.plans.details', ['plan' => $plan]);
    }
}

<?php

use Illuminate\Support\Facades\Auth;

function adminUser()
{
    return Auth::guard('admin')->user();
}

<?php

use Illuminate\Support\Facades\Auth;

function adminUser()
{
    return Auth::guard('admin')->user();
}

function supportUser()
{
    return Auth::guard('support')->user();
}
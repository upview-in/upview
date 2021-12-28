<?php

namespace App\Http\Controllers\User\Ayrshare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AyrProfileController extends Controller
{
    function index()
    {
        return view('user.profile_manage');
    }
}

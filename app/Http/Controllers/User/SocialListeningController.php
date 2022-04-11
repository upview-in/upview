<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialListeningController extends Controller
{
    public function index()
    {
        return view('user.social_listening');
    }
}

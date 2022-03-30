<?php

namespace App\Http\Controllers;

class MainSiteController extends Controller
{
    public function index()
    {
        return view('main.home');
    }

    public function showPrivacyPolicy()
    {
        return view('main.privacy_policy');
    }
}

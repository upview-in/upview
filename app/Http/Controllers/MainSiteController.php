<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainSiteController extends Controller
{
    public function index()
    {
        return view('site-main.index');
    }

    public function showPrivacyPolicy()
    {
        return view('site-main.privacy-policy');
    }
}

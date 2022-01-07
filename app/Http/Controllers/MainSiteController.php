<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainSiteController extends Controller
{
    public function index() 
    {
        return view('main.index');
    }

    public function showPrivacyPolicy() 
    {
        return view('main.privacy_policy');

    }
}

<?php

namespace App\Http\Controllers\User\Analyze\Instagram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(){
            return view('user.analyze.instagram.ig_overview');
    }
}

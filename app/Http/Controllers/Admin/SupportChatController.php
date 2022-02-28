<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSupport;
use Illuminate\Http\Request;

class SupportChatController extends Controller
{
    public function index()
    {
        $supportQuery = UserSupport::all();
        return view('admin.user-support.support-list', ['supportQuery' => $supportQuery]);
    }
}

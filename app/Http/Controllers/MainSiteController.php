<?php

namespace App\Http\Controllers;

use App\Http\Requests\Main\ContactUsRequest;
use App\Models\ContactUs;

class MainSiteController extends Controller
{
    public function index()
    {
        return view('main.home');
    }

    public function contactUs(ContactUsRequest $request)
    {
        $contact = new ContactUs();
        $contact->name = $request->txtname;
        $contact->email = $request->txtemail;
        $contact->message = $request->txtmessage;
        $contact->save();
        return view('main.home');
    }

    public function showPrivacyPolicy()
    {
        return view('main.privacy_policy');
    }
}

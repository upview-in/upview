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

    public function about()
    {
        return view('main.about');
    }

    public function features()
    {
        return view('main.features');
    }

    public function pricing()
    {
        return view('main.pricing');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function contactUs(ContactUsRequest $request)
    {
        $contact = new ContactUs();
        $contact->name = $request->txtname;
        $contact->email = $request->txtemail;
        $contact->message = $request->txtmessage;
        $contact->save();
        return redirect(route('main.index'));
    }

    public function showPrivacyPolicy()
    {
        return view('main.privacy-policy');
    }
}

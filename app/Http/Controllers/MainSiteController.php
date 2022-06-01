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

    public function socialAnalytics()
    {
        return view('main.social-analytics');
    }

    public function socialPosting()
    {
        return view('main.social-posting');
    }

    public function socialListening()
    {
        return view('main.social-listening');
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
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->mobile_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('message2', 'Awesome! Someone from team Upview will contact you soon');
    }

    public function showPrivacyPolicy()
    {
        return view('main.privacy-policy');
    }
}

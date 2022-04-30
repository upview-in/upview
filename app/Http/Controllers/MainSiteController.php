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
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->mobile_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('message2', 'Thank-You! Someone from Upview will contact you in 48 hours.');
    }

    public function showPrivacyPolicy()
    {
        return view('main.privacy-policy');
    }
}

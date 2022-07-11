<?php

namespace App\Http\Controllers;

use App\Http\Requests\Main\ContactUsRequest;
use App\Models\Blog;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class MainSiteController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('main.home', ['blogs' => $blogs]);
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

    public function blog(Request $request, Blog $blog)
    {
        if ($blog->enabled ?? true) {
            return view('main.blog', ['blog' => $blog]);
        }
        abort(404);
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function videos()
    {
        return view('main.videos');
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
    public function showAppPrivacyPolicy()
    {
        return view('main.app-privacy-policy');
    }

    public function showTermsAndConditions()
    {
        return view('main.terms-condition');
    }

    public function socialAnalyticsInner()
    {
        return view('main.features.social-analytics-inner');
    }

    public function socialPostingInner()
    {
        return view('main.features.social-posting-inner');
    }

    public function socialListeningInner()
    {
        return view('main.features.social-listening-inner');
    }
}

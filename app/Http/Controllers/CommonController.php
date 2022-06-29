<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class CommonController extends Controller
{
    public function displayMedia(Request $request, $dir, $file)
    {
        $file = storage_path('app/' . $dir . '/' . $file);

        if (!File::exists($file)) {
            return abort(404);
        }

        $type = File::mimeType($file);
        $file = File::get($file);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);

        return $response;
    }

    public function privacyPolicy(Request $request)
    {
        return view('main.privacy-policy');
    }
}

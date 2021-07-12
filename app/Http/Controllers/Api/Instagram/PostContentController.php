<?php

namespace App\Http\Controllers\Api\Instagram;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class PostContentController extends Controller
{
    public function index()
    {
        return view('post-content');
    }


    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,mp4|max:5000'
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
   

        $filetype = $request->file->getClientMimeType();


        if(strpos($filetype, "image") !== false)
        {
            dd($filetype);
        }
        else
        {
            dd('video');
        }

        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file', $fileName);
    }
}

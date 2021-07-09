<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postContent extends Controller
{
    public function index()
    {
        return view('post-content');
    }


    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,mp4|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
   
        return back()
            ->with('success','You have successfully uploaded the file.')
            ->with('file', $fileName);
    }
}

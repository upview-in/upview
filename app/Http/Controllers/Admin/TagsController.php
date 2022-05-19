<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function suggest(Request $request)
    {
        $request->validate([
            'search' => ['required', 'min:2', 'max:255'],
        ]);
        $data = Tags::search()->select(['_id', 'tag'])->orderBy('_id', 'desc')->limit(20)->get();

        return $data->count() > 0 ? $data->toJson() : [['_id' => $request->search, 'tag' => $request->search]];
    }

    public function add(Request $request)
    {
        $request->validate([
            'tag' => ['required', 'min:3', 'max:255'],
        ]);

        if (!Tags::where('tag', $request->tag)->exists()) {
            $tag = new Tags();
            $tag->tag = $request->tag;
            $tag->save();

            return ['code' => 200, 'message' => 'success'];
        }

        return ['code' => 200, 'message' => 'exists'];
    }
}

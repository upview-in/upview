<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function getStateList(Request $request)
    {
        $request->validate([
            '_id' => 'required'
        ]);

        $c = Country::find($request->_id);
        if (is_null($c)) {
            return response()->json(['message' => 'given country not found!']);
        }

        return State::where('country_id', $c->id)->get()->toJson();
    }

    public function getCityList(Request $request)
    {
        $request->validate([
            '_id' => 'required'
        ]);

        $c = State::find($request->_id);
        if (is_null($c)) {
            return response()->json(['message' => 'given state not found!']);
        }

        return City::where('state_id', $c->id)->get()->toJson();
    }
}

<?php

namespace App\Helper;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Auth;

class Functions {

    public static function getAvailableLanguages(): array
    {
        $languages = array();
        $langDir = resource_path('lang');
        $files = scandir($langDir);
        foreach($files as $file) {
            if(is_file($langDir.'/'.$file)) {
                $languages[] = str_replace('.json', '', $file);
            }
        }
        return $languages;
        
        // $langDir = resource_path('lang');
        // return array_diff(scandir($langDir), array('..', '.'));
    }

    public static function getUserCountry()
    {
        $user = Auth::user();
        return Country::find($user->country);
    }

    public static function getUserState()
    {
        $user = Auth::user();
        return State::find($user->state);
    }

    public static function getUserCity()
    {
        $user = Auth::user();
        return City::find($user->city);
    }

}
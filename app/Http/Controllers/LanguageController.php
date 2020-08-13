<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function language($lang)
    {
        if (in_array($lang, ['ar', 'en'])) {
            if (auth()->user()) {
                $user = auth()->user();
                $user->lang = $lang;
                $user->save();
            } else {
                if (session()->has('lang')) {
                    session()->forget('lang');
                }
                session()->put('lang', $lang);
            }
        } else {
            $deflang = 'ar';
            if (auth()->user()) {
                $user = auth()->user();
                $user->lang = $deflang;
                $user->save();
            } else {
                if (session()->has('lang')) {
                    session()->forget('lang');
                }
                session()->put('lang', $deflang);
            }
        }
        return back()->withinput();
    }
}

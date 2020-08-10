<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function vieweditprofile()
    {
        return view('editprofile');
    }

    public function editprofile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        $name = $request->name;
        $email = $request->email;
        User::where('id',auth()->user()->id)->update(['name'=>$name,'email'=>$email]);
        return redirect()->route('home')->with('status','profile has been edited successfully.');
    }
    public function language($lang) {
        if (in_array($lang,['ar','en'])) {
            if (auth()->user()) {
                $user = auth()->user();
                $user->lang = $lang;
                $user->save();
            }else{
                if(session()->has('lang')){
                    session()->forget('lang');
                }
                session()->put('lang',$lang);
            }
        }else {
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

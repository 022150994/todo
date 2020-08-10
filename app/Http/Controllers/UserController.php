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
}

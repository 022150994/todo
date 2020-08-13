<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

use Illuminate\Support\Facades\Validator;

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
        $messages = [
            'avatar.image' =>trans('main.avataruploaderror')
        ];
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'avatar' => 'image'
        ],$messages)->validate();
        $baseurl = '/public/';
        if($request->hasFile('avatar')) {
            if (auth()->user()->avatar != 'images/anonymous-user.png') {
                Storage::delete($baseurl . auth()->user()->avatar);
            }
            $avatar = $request->avatar->store('images','public');
        }else{
            if(auth()->user()->avatar != 'images/anonymous-user.png'){
                Storage::delete($baseurl . auth()->user()->avatar);
            }
            $avatar = 'images/anonymous-user.png';

        }
        $name = $request->name;
        $email = $request->email;
        User::where('id',auth()->user()->id)->update(['name'=>$name,'email'=>$email,'avatar'=>$avatar]);
        return redirect()->route('home')->with('status','profile has been edited successfully.');
    }
}

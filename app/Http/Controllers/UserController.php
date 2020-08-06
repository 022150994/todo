<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $user = new User();
        // $user->name = 'salem';
        // $user->email = 'portediloce1@gmail.com';
        // $user->password = bcrypt('1234');
        // $user->save();
        // dd($user);

        // User::where('id',4)->delete();
        // User::where('id',6)->update(['name'=>'snowguy','email'=>'whiterabbit@gmail.cim']);
        
        // $data = [
        //     'name'=>'salem',
        //     'email'=>'whitebunny',
        //     'password'=>bcrypt('1234')
        // ];
        // User::create($data);

        
        $user = User::all();
        return $user;
    }
}

<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function showtodos(){
        return view('todos');
    }
    public function createtodoform(){
        return view('createtodo');
    }

    public function createtodo(Request $request){
        $messages = [
            'title.require' => trans('main.todotitlerequire')
        ];
        Validator::make($request->all(), [
            'title' => 'required|max:255',
        ], $messages)->validate();
        auth()->user()->todos->create([
            'title' => $request->title,
        ]);
        return redirect()->route('todoviewer');
    }
}

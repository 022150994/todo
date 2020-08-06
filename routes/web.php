<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
/* 
|----------------------------- ---------------------------------------------
| Web Rasdfasdfoutes
|--------------------------------------------------------------------------
|
| Here is where you can sdafasdfasdfregister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/users', 'UserController@index');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

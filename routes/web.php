<?php

use App\Http\Controllers\UserController;
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

Route::get('/lang/{lang}', 'LanguageController@language');


Auth::routes();

Route::group(['middleware' => 'Lang'], function () {
    Auth::routes();
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/users', 'UserController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/editprofile', 'UserController@vieweditprofile')->name('editprofile');
    Route::post('/editprofile', 'UserController@editprofile')->name('posteditprofile');


});

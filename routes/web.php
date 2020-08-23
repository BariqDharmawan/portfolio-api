<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('dashboard')->group(function (){
    Route::get('/', 'HomeController@dashboard');
    Route::get('{any}', function (){
        return view('layouts.master');
    })->where('any', '.*');
});

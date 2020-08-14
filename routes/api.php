<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::namespace('API')->group(function(){
    Route::apiResource('skill', 'SkillController')->except('update');
    Route::apiResource('contact', 'ContactController')->except('update');
    Route::apiResource('project', 'ProjectController')->except('update');
    Route::match(['post', 'put'], 'skill/{id?}', 'SkillController@save')->name('skill.save');
    Route::match(['post', 'put'], 'contact/{id?}', 'ContactController@save')->name('contact.save');
    Route::match(['post', 'put'], 'project/{id?}', 'ProjectController@save')->name('project.save');
});
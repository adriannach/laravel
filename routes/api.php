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
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::get('/comment', 'API\CommentController@index')->middleware('auth:api');
Route::post('/comment/store', 'API\CommentController@store')->middleware('auth:api')->name('commentStore');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

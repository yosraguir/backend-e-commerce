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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Article routes
Route::any('add', 'ArticleController@add');
Route::any('update', 'ArticleController@update');
Route::any('delete', 'ArticleController@delete');
Route::any('show', 'ArticleController@show');

//user routes
Route::any('register', 'UserController@register');
Route::any('login', 'UserController@login');



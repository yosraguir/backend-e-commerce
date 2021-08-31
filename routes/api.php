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

////////Article routes/////////

Route::post('/article/add','App\Http\Controllers\ArticleController@add');
Route::post('/article/{id}', 'App\Http\Controllers\ArticleController@update');
Route::delete('/article/{id}', 'App\Http\Controllers\ArticleController@delete');
Route::get('/article/show/{id}', 'App\Http\Controllers\ArticleController@show');

/////////Categorie routes/////////
Route::post('/categorie/add','App\Http\Controllers\CategorieController@create');
Route::post('/categorie/{id}', 'App\Http\Controllers\CategorieController@update');
Route::delete('/categorie/{id}', 'App\Http\Controllers\CategorieController@delete');
Route::get('/categorie/show/{id}', 'App\Http\Controllers\CategorieController@show');


////////////Sous_Categorie routes//////////
Route::post('/SousCategorie/add','App\Http\Controllers\SousCategorieController@create');
Route::post('/SousCategorie/{id}', 'App\Http\Controllers\SousCategorieController@update');
Route::delete('/SousCategorie/{id}', 'App\Http\Controllers\SousCategorieController@delete');
Route::get('/SousCategorie/show/{id}', 'App\Http\Controllers\SousCategorieController@show');


//user routes
Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/login', 'App\Http\Controllers\UserController@login');





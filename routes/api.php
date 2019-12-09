<?php

use App\User;
use Illuminate\Http\Request;

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

//******Custom APi List item********
Route::get('/articles', 'API/ApiArticleControler@showArt');
Route::get('/article/{id}', 'API/ApiArticleControler@showIDAPI');
Route::put('articles/{article}', 'API/ApiArticleController@update');
Route::delete('articles/{article}', 'API/ApiArticleController@delete');

//******** Custom Auth PassportAPI

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::post('details', 'API\AuthController@details');
    Route::post('logout', 'API\AuthController@logout')->name('logout');
});


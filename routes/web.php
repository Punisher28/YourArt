<?php

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

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('index');
Auth::routes(['verify' => true]);

Route::get('profile', 'ProfileController@index')->name('home');
Route::post('profile/changePass', 'ProfileController@changePass')->name('changePass');
Route::post('profile/changeTel', 'ProfileController@changeTel')->name('changeTel');
Route::post('profile/changeCity', 'ProfileController@changeCity')->name('changeCity');
Route::post('profile/changeBirthday', 'ProfileController@changeBirthday')->name('changeBirthday');
Route::post('profile/changeImg', 'ProfileController@changeImg')->name('changeImg');
Route::post('profile/addItem', 'ProfileController@addItem')->name('addItem');
Route::get('profile/dellItem/{id_item}-{user_id}', 'ProfileController@dellItem')->name('dellItem');


Route::get('articles/','ArticlesController@index')->name('list');
Route::get('item/{id}','ArticlesController@view')->name('item');

Route::get('addcart/{id}','CartController@getAddToCart')->name('addcart');
Route::get('dellcart','CartController@dellToCart')->name('dellcart');
Route::get('cart', 'CartController@index')->name('index.cart');

Route::get('test','TestController@test');
Route::post('test/post','TestController@testaja')->name('storage');

Route::get('parse','ParseController@test');

Route::get('/home', 'HomeController@index')->name('home');

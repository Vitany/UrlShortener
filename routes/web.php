<?php

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

Route::get('/', 'UrlsController@index')->name('url.index');

Route::resource('url', 'UrlsController');
Route::get('list', 'UrlsController@list')->name('url.list');

Route::get('{code}', 'UrlsController@show')->name('url.show');



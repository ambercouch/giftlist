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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => '/', 'middleware' => 'auth' ], function()
{
    Route::get('/home', 'Web\HomeController@index');
    Route::get('/giftlists', 'Web\GiftlistController@index');
    Route::get('/giftlist/{id}', 'Web\GiftlistController@show');
    Route::get('/settings', 'Web\SettingsController@index');
});


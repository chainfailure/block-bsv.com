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

Route::get('/', 'LandingController@index');
Route::get('/setup', 'SetupController@requestConsent')->name('twitter.setup');
Route::get('/twitter-callback', 'SetupController@callback')->name('twitter.callback');
Route::get('/process', 'SetupController@process')->name('twitter.process');
Route::get('/done', 'SetupController@done')->name('twitter.done');

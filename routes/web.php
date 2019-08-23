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
Route::get('/setup', 'BlockController@requestConsent')->name('block.setup');
Route::get('/twitter-callback', 'BlockController@callback')->name('block.callback');
Route::get('/process', 'BlockController@process')->name('block.process');
Route::get('/done', 'BlockController@done')->name('block.done');

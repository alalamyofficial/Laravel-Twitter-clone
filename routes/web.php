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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', function () {
    return view('public_tweet_panel');
});

Route::post('tweet/store', 'TweetController@store')->name('tweet.store');
Route::get('/tweets', 'TweetController@show')->name('tweet.show');


//explorers
Route::get('/explore', 'ExplorerController@users')->name('explore.show');

Route::post('/profiles/{user}/follow','FollowsController@store')->name('follow');

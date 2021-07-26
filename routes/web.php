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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', function () {
//     return view('public_tweet_panel');
// })->name('home');

// Route::get('/home', 'TweetController@UserTweets')->name('home');





//profile
Route::get('/profile/{user}','ProfilesController@show')->name('profile');

//like


Route::group(['middleware' => 'auth'], function () {
    
    
    //tweet
    Route::get('/tweets','TweetController@index')->name('home');
    Route::post('tweet/store', 'TweetController@store')->name('tweet.store');
    Route::get('/tweets/show', 'TweetController@show')->name('tweet.show');

    //likes
    Route::post('/like/tweet/{tweet}','LikesController@likeTweet')->name('like');

    //explorers
    Route::get('/explore', 'ExplorerController@users')->name('explore.show');

    //follow
    Route::post('/profiles/{user}/follow','FollowController@store')->name('follow');

    Route::get('/profiles/{id}/followings/','FollowController@getFollowings')->name('user.followings');
    Route::get('/profiles/{id}/followers/','FollowController@getFollowers')->name('user.followers');


    //profile
    Route::get('/profiles/{user}/edit','ProfilesController@edit')->name('user.edit');
    Route::patch('/profiles/{user}/update', 'ProfilesController@update')->name('user.update');

});
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
Route::get('profile/{user}','ProfilesController@show')->name('profile');
Route::get('profile/{user}/media','ProfilesController@media_tweets')->name('media_tweets');
Route::get('profile/{user}/like','ProfilesController@like_tweets')->name('like_tweets');

//like


Route::group(['middleware' => 'auth'], function () {
    
    
    //tweet
    Route::get('tweets','TweetController@index')->name('home');
    Route::post('tweet/store', 'TweetController@store')->name('tweet.store');
    Route::get('/tweets/show', 'TweetController@show')->name('tweet.show');
    Route::get('/tweet/{tweet_id}', 'TweetController@single_tweet')->name('single_tweet');
    Route::delete('/tweets/delete/{id}', 'TweetController@destroy')->name('tweet.destroy');


    //likes
    // Route::post('/like/tweet/{tweet}','LikesController@likeTweet')->name('like');
    // Route::post('{user}/like','LikesController@store')->name('like');
    // Route::post('tweet/like/{tweet}', 'LikesController@likeTweet')->name('like.store');
    // Route::post('/likes/{id}', 'LikesController@likes');
    // Route::post('/unlikes/{id}', 'LikesController@unlikes');
    // Route::post('like', 'TweetController@LikeTweet')->name('like');
    // Route::post('tweets/{tweet}/likes', 'TweetController@storeLike')->name('tweets.likes.store');
    Route::delete('tweets/{tweet}/likes', 'TweetController@destroyLike')->name('tweets.likes.destroy');

    Route::post('tweets/{tweet}/likes', 'TweetController@toggleLike')->name('tweets.likes.store');

    
    //explorers
    Route::get('/explore', 'ExplorerController@users')->name('explore.show');

    //follow
    Route::post('/profiles/{user}/follow','FollowController@store')->name('follow');

    Route::get('/profiles/{id}/followings/','FollowController@getFollowings')->name('user.followings');
    Route::get('/profiles/{id}/followers/','FollowController@getFollowers')->name('user.followers');


    //profile
    Route::get('/profiles/{user}/edit','ProfilesController@edit')->name('user.edit');
    Route::patch('/profiles/{user}/update', 'ProfilesController@update')->name('user.update');

    //Comment
    Route::post('comment/store/{tweet}', 'CommentController@addComment')->name('comment.store');
    Route::get('/getComments/{tweet}', 'CommentController@getComments')->name('comment.show');

    //notifications
    Route::get('unreadNotifications', 'CommentController@unreadNotifications');
    Route::get('markAsRead', 'CommentController@markAsRead');
    Route::get('/notifications', 'NotificationController@all_notifications');

    //bookmark
    Route::post('bookmark/{tweet}/add','BookmarkController@add')->name('tweet.bookmark');
    Route::get('bookmark/show','BookmarkController@show')->name('tweet.showBookmark');


});
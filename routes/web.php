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




//profile
Route::get('profile/{user}','ProfilesController@show')->name('profile');
Route::get('profile/{user}/media','ProfilesController@media_tweets')->name('media_tweets');
Route::get('profile/{user}/like','ProfilesController@like_tweets')->name('like_tweets');
Route::get('profile/{user}/retweets','ProfilesController@retweets')->name('retweet_tweets');




Route::group(['middleware' => 'auth'], function () {
    
    
    //tweet
    Route::get('tweets','TweetController@index')->name('home');
    Route::post('tweet/store', 'TweetController@store')->name('tweet.store');
    Route::get('/tweets/show', 'TweetController@show')->name('tweet.show');
    Route::get('/tweet/{tweet_id}', 'TweetController@single_tweet')->name('single_tweet');
    Route::get('/tweet/{tweet_id}/edit', 'TweetController@edit')->name('tweet.edit');
    Route::patch('/tweets/update/{id}', 'TweetController@update')->name('tweet.update');
    Route::delete('/tweets/delete/{id}', 'TweetController@destroy')->name('tweet.destroy');


    //likes
    Route::post('tweet/{tweet}/like','LikeController@store')->name('tweet.like');
    Route::delete('tweet/{tweet}/like','LikeController@destroy')->name('tweet.like');
    Route::get('tweet/likes/{id}','LikeController@who_like_tweet')->name('tweet.likes');

    
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
    Route::get('bookmark','BookmarkController@show')->name('tweet.showBookmark');
    Route::post('bookmark/{tweet}/add','BookmarkController@add')->name('tweet.bookmark');
    Route::delete('bookmark/{tweet}/destroy','BookmarkController@destroy')->name('tweet.bookmark.destroy');

    //hashtags
    Route::get('/hashtag/{hashtag}', 'HashtagController@index')->name('hashtag');

    Route::get('/trends','HashtagController@trends')->name('trends');


    //retweet
    Route::get('/retweet/create/{id}','RetweetController@store')->name('retweet.create');
    Route::get('/retweet/destroy/{id}', 'RetweetController@noRetweet');

    Route::get('/retweet/all', 'RetweetController@all_retweets');

    //list
    Route::get('list','ListsController@create')->name('list');
    Route::post('list','ListsController@store')->name('list.store');
    Route::get('/list/edit/{id}','ListsController@edit')->name('list.edit');
    Route::patch('/list/update/{id}','ListsController@update')->name('list.update');
    Route::delete('list/delete/{id}','ListsController@destroy')->name('list.delete');
    
    //hashtags
    Route::get('/hashtag/{hashtag}', 'HashtagController@index')->name('hashtag');
    
    //blue verifiy
    Route::get('blue/verifiy','BlueVerifiyController@index')->name('blue.verifiy');
    Route::post('blue/verifiy/store','BlueVerifiyController@store')->name('verifiy.store');
});


Route::group(['middleware' => ['auth','is_Admin']], function () { 

    Route::group(['prefix' => 'admin'], function(){
    
    //admin
    
        //dasboard
        Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    
        //tweets
        Route::get('/tweets','AdminController@all_tweets')->name('admin.tweets');
        Route::delete('/tweets/destroy/{id}','AdminController@remove_tweet')->name('admin.tweets.destroy');
    
        //users
        Route::get('/users','AdminController@all_users')->name('admin.users');
        Route::get('/user/{id}/edit','AdminController@edit_user')->name('admin.user.edit');
        Route::patch('/user/update/{id}','AdminController@update_user')->name('admin.user.update');
        Route::delete('/user/destroy/{id}','AdminController@remove_user')->name('admin.user.destroy');
    
    
        //bookmarks
        Route::get('/bookmarks','AdminController@all_bookmarks')->name('admin.bookmarks');
        Route::delete('/bookmark/destroy/{id}','AdminController@remove_bookmark')->name('admin.bookmark.destroy');
    
    
        //tweets
        Route::get('/retweets','AdminController@all_retweets')->name('admin.retweets');
        Route::delete('/retweets/destroy/{id}','AdminController@remove_retweet')->name('admin.retweet.destroy');
    
    
        //lists
        Route::get('/lists','AdminController@all_lists')->name('admin.lists');
        Route::delete('/list/destroy/{id}','AdminController@remove_list')->name('admin.list.destroy');
    
    
        //hashtags
        Route::get('/hashtags','AdminController@all_hashtags')->name('admin.hashtags');
        Route::delete('/hashtag/destroy/{id}','AdminController@remove_hashtag')->name('admin.hashtag.destroy');
    
        //comments
        Route::get('/comments','AdminController@all_comments')->name('admin.comments');
        Route::delete('/comment/destroy/{id}','AdminController@remove_comment')->name('admin.comment.destroy');
    
        //friends
        Route::get('/friends','AdminController@friends')->name('admin.friends');
    
    
        //likes
        Route::get('/likes','AdminController@all_likes')->name('admin.likes');
        Route::delete('/like/destroy/{id}','AdminController@remove_like')->name('admin.like.destroy');
    
        //visits
        Route::get('/users/visits','AdminController@all_views')->name('admin.users.visits');
    
        //messages
        Route::get('users/messages','AdminController@all_messages')->name('admin.users.messages');
        Route::delete('/message/destroy/{id}','AdminController@remove_message')->name('admin.message.destroy');
    
        //verifies
        Route::get('/verifies','AdminController@all_verifies')->name('admin.verifies');
        Route::delete('/verifiy/destroy/{id}','AdminController@remove_verifiy')->name('admin.verifiy.destroy');
    
    
    });

});


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
Route::get('profile/{user}/retweets','ProfilesController@retweets')->name('retweet_tweets');

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
    // Route::delete('tweets/{tweet}/likes', 'TweetController@destroyLike')->name('tweets.likes.destroy');

    // Route::post('tweets/{tweet}/likes', 'TweetController@toggleLike')->name('tweets.likes.store');

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
    Route::delete('list/delete/{id}','ListsController@destroy')->name('list.delete');

    //hashtags
    Route::get('/hashtag/{hashtag}', 'HashtagController@index')->name('hashtag');

});

//admin

//dasboard
Route::get('admin/dashboard','AdminController@dashboard')->name('admin.dashboard');

//tweets
Route::get('admin/tweets','AdminController@all_tweets')->name('admin.tweets');
Route::delete('admin/tweets/destroy/{id}','AdminController@remove_tweet')->name('admin.tweets.destroy');

//users
Route::get('admin/users','AdminController@all_users')->name('admin.users');
Route::delete('admin/user/destroy/{id}','AdminController@remove_user')->name('admin.user.destroy');


//bookmarks
Route::get('admin/bookmarks','AdminController@all_bookmarks')->name('admin.bookmarks');
Route::delete('admin/bookmark/destroy/{id}','AdminController@remove_bookmark')->name('admin.bookmark.destroy');


//tweets
Route::get('admin/retweets','AdminController@all_retweets')->name('admin.retweets');
Route::delete('admin/retweets/destroy/{id}','AdminController@remove_retweet')->name('admin.retweet.destroy');


//lists
Route::get('admin/lists','AdminController@all_lists')->name('admin.lists');
Route::delete('admin/list/destroy/{id}','AdminController@remove_list')->name('admin.list.destroy');


//hashtags
Route::get('admin/hashtags','AdminController@all_hashtags')->name('admin.hashtags');
Route::delete('admin/hashtag/destroy/{id}','AdminController@remove_hashtag')->name('admin.hashtag.destroy');

//comments
Route::get('admin/comments','AdminController@all_comments')->name('admin.comments');
Route::delete('admin/comment/destroy/{id}','AdminController@remove_comment')->name('admin.comment.destroy');

//friends
Route::get('admin/friends','AdminController@friends')->name('admin.friends');


//likes
Route::get('admin/likes','AdminController@all_likes')->name('admin.likes');
Route::delete('admin/like/destroy/{id}','AdminController@remove_like')->name('admin.like.destroy');

//visits
Route::get('admin/users/visits','AdminController@all_views')->name('admin.users.visits');

//messages
Route::get('admin/users/messages','AdminController@all_messages')->name('admin.users.messages');
Route::delete('admin/message/destroy/{id}','AdminController@remove_message')->name('admin.message.destroy');


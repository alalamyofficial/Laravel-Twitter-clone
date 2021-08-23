<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use App\Retweet;
use App\Hashtag;
use App\Profile;
use App\Comment;
use App\Like;
use App\Follow;
use App\Lists;
use DB;

class AdminController extends Controller
{
    public function dashboard(){

        $bookmark_tweets = DB::table('bookmark_tweet')->get();

        $followers_count = DB::table('follows')->pluck('user_id')->count();
        $followings_count = DB::table('follows')->pluck('following_user_id')->count();

        $comments = Comment::latest()->limit(2)->get();

        return view('admin.dashboard',compact('bookmark_tweets',
        'followers_count',
        'followings_count',
        'comments'
        
        ));

    }

    public function all_tweets()
    {
        $tweets = Tweet::with('user')->latest()->paginate(5);
        return view('admin.tweets',compact('tweets'));
    }

    public function remove_tweet($id){

        $tweet = Tweet::findOrFail($id);
        $tweet->destroy($id);
        return redirect()->back();

    }
}

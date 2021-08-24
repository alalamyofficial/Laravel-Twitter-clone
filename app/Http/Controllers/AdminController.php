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
use Auth;

class AdminController extends Controller
{
    public function dashboard(){

        $bookmark_tweets = DB::table('bookmark_tweet')->get();
        $followers_count = DB::table('follows')->pluck('user_id')->count();
        $followings_count = DB::table('follows')->pluck('following_user_id')->count();
        $view_count = DB::table('shetabit_visits')->count();
        $comments = Comment::latest()->limit(2)->get();

        $users = User::latest()->limit(3)->get();

        return view('admin.dashboard',compact(
            'bookmark_tweets',
            'followers_count',
            'followings_count',
            'comments',
            'users',
            'view_count'
        ));

    }

    //tweets
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

    //users
    public function all_users(){
        $users = User::latest()->paginate(5);
        return view('admin.users',compact('users'));
    }
    public function remove_user($id){
        $user = User::findOrFail($id);
        $user->destroy($id);
        return redirect()->back();
    }


    //bookmarks
    public function all_bookmarks()
    {
        $bookmarks = DB::table('bookmark_tweet')->latest()->paginate(5);
        return view('admin.bookmarks',compact('bookmarks'));
    }

    public function remove_bookmark($id){
        $tweet = Tweet::findOrFail($id);
        $tweet->destroy($id);
        return redirect()->back();
    }


    //retweets
    public function all_retweets()
    {
        $retweets = Tweet::with('user')->where('retweet','=',1)->latest()->paginate(5);
        return view('admin.retweets',compact('retweets'));
    }
    public function remove_retweet($id){
        $retweet = Tweet::findOrFail($id);
        $retweet->destroy($id);
        return redirect()->back();
    }

    //lists
    public function all_lists()
    {
        $lists = Lists::with('user')->latest()->paginate(5);
        return view('admin.lists',compact('lists'));
    }
    public function remove_list($id){
        $list = Lists::findOrFail($id);
        $list->destroy($id);
        return redirect()->back();
    }

    //hashtags  
    public function all_hashtags()
    {
        $hashtags = Hashtag::with('tweets')->latest()->paginate(5);
        return view('admin.hashtags',compact('hashtags'));
    }
    public function remove_hashtag($id){
        $hashtag = Hashtag::findOrFail($id);
        $hashtag->destroy($id);
        return redirect()->back();
    }

    //comments  
    public function all_comments()
    {
        $comments = Comment::with('tweet','user')->latest()->paginate(5);
        return view('admin.comments',compact('comments'));
    }
    public function remove_comment($id){
        $comment = Comment::findOrFail($id);
        $comment->destroy($id);
        return redirect()->back();
    }

    public function friends(User $user){

        // $user = Auth::user();
        // $friends = $user->follows()->latest()->get();
        // $followers = Auth::user()->follows()->get();

        $friends = DB::table('follows')->latest()->get();

        return view('admin.friends',compact('friends'));

    }

    //likes  
    public function all_likes()
    {
        $likes = Like::with('tweet','user')->latest()->paginate(5);
        return view('admin.likes',compact('likes'));
    }
    public function remove_like($id){
        $likes = Like::findOrFail($id);
        $likes->destroy($id);
        return redirect()->back();
    }

    //views  
    public function all_views()
    {
        $visits = DB::table('shetabit_visits')->latest()->paginate(5);
        $view_count = DB::table('shetabit_visits')->count();
        return view('admin.visits',compact('visits','view_count'));
    }

    //likes  
    public function all_messages()
    {
        $messages = DB::table('messages')->latest()->paginate(5);
        $message_count = DB::table('messages')->count();
        return view('admin.messages',compact('messages','message_count'));
    }
    public function remove_message($id){
        $message = DB::table('messages')->where('id',$id)->delete();
        return redirect()->back();
    }
}

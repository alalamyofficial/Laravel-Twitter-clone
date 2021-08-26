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
use App\BlueVerifiy;


class AdminController extends Controller
{
    public function dashboard(){

        $bookmark_tweets = DB::table('bookmark_tweet')->get();
        $followers_count = DB::table('follows')->pluck('user_id')->count();
        $followings_count = DB::table('follows')->pluck('following_user_id')->count();
        $view_count = DB::table('shetabit_visits')->count();
        $comments = Comment::latest()->limit(2)->get();
        $users = User::latest()->limit(3)->get();
        $latest_messages = DB::table('messages')->latest()->limit(3)->get();

        $view = DB::table('shetabit_visits')->select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');


        return view('admin.dashboard',compact(
            'bookmark_tweets',
            'followers_count',
            'followings_count',
            'comments',
            'users',
            'view_count',
            'view',
            'latest_messages'
        ));

    }

    //tweets
    public function all_tweets()
    {
        $tweets = Tweet::with('user')->latest()->paginate(5);
        $tweet_count = Tweet::with('user')->count();
        return view('admin.tweets',compact('tweets','tweet_count'));
    }
    public function remove_tweet($id){
        $tweet = Tweet::findOrFail($id);
        $tweet->destroy($id);
        return redirect()->back();
    }

    //users
    public function all_users(){
        $users = User::latest()->paginate(5);
        $users_count = User::all()->count();
        return view('admin.users',compact('users','users_count'));
    }
    public function edit_user($id){
        $user = User::findOrFail($id);
        return view('admin.edit_users',compact('user'));
    }
    public function update_user(User $user, Request $request ,$id){
        
        $this->validate($request,[

            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'avatar' => 'sometimes',
            'role' => 'required',
            'verified' => 'sometimes'

        ]);
        
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
        
            $img_file = $request->image;
    
            $new_image = time().$img_file->getClientOriginalName();
    
            $img_file->move('public/storage/imgs/',$new_image);
    
            $user->image = 'public/storage/imgs/'.$new_image;
    
            $update_user_data = [

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $request->avatar,
                'role' => $request->role, 
                'verified' => $request->verified, 
    
            ];
    
            $user->update($update_user_data);
    
            $user->save();
    
            return redirect()->route('admin.users');
    
        }
        else
        {
            $update_user_data = [

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'verified' => $request->verified, 
 
    
            ];
    
            $user->update($update_user_data);
    
            $user->save();
    
            return redirect()->route('admin.users');
    
        }    


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
        $bookmark_count = DB::table('bookmark_tweet')->count();
        return view('admin.bookmarks',compact('bookmarks','bookmark_counts'));
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
        $retweet_count = Tweet::with('user')->where('retweet','=',1)->count();
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
        $list_count = Lists::with('user')->count();
        return view('admin.lists',compact('lists','list_count'));
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
        $hashtag_count = Hashtag::withCount('tweets')->count();
        return view('admin.hashtags',compact('hashtags','hashtag_count'));
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
        $comment_count = Comment::with('tweet','user')->count();
        return view('admin.comments',compact('comments','comment_count'));
    }
    public function remove_comment($id){
        $comment = Comment::findOrFail($id);
        $comment->destroy($id);
        return redirect()->back();
    }

    public function friends(User $user){

        $friends = DB::table('follows')->latest()->get();
        $friend_count = DB::table('follows')->count();
        return view('admin.friends',compact('friends','friend_count'));
    }

    //likes  
    public function all_likes()
    {
        $likes = Like::with('tweet','user')->latest()->paginate(5);
        $like_count = Like::with('tweet','user')->count();
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


    public function all_verifies(){
        $verifies = BlueVerifiy::latest()->get();
        return view('admin.verifies',compact('verifies'));
    }
    public function remove_verifiy($id){
        $verifiy = BlueVerifiy::findOrFail($id);
        $verifiy->destroy($id);
        return redirect()->back();
    }


}

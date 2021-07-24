<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikesController extends Controller
{
    // public function store(Request $request){

    //     $like = new Like;

    //     $like->user_id = Auth::id();
    //     $like->post_id = $request->tweets()->id;

    //     $like->save();

    // }

    public function likeTweet($tweet){

        // Check if user already liked the post or not
        $user = Auth::user();
        $likeTweet = $user->likedPosts()->where('post_id', $tweet)->count();
        if($likeTweet == 0){
            $user->likedTweets()->attach($tweet);
        } else{
            $user->likedTweets()->detach($tweet);
        }
        return redirect()->back();

    }
}

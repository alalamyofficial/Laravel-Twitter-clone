<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use App\User;
use App\Tweet;
use Illuminate\Database\Eloquent\SoftDeletes;


class LikesController extends Controller
{
    // public function store(Request $request){

    //     $like = new Like;

    //     $like->user_id = Auth::id();
    //     $like->post_id = $request->tweets()->id;

    //     $like->save();

    // }

    // public function likeTweet($tweet){

    //     // Check if user already liked the post or not
    //     $user = Auth::user();
    //     $likeTweet = $user->likedPosts()->where('post_id', $tweet)->count();
    //     if($likeTweet == 0){
    //         $user->likedTweets()->attach($tweet);
    //     } else{
    //         $user->likedTweets()->detach($tweet);
    //     }
    //     return redirect()->back();

    // }

    // public function store(User $user){

    //     current_user()->toggleLike($user);

    //     return back();

    // }

    // public function like(Tweet $tweet)
    // {

    //     $existing_like = Like::withTrashed()->whereTweetId($tweet->id)->whereUserId(Auth::id())->first();

    //     if (is_null($existing_like)) {
    //         Like::create([
    //             'tweet_id' => $tweet->id,
    //             'user_id' => Auth::id()
    //         ]);
    //     } else {
    //         if (is_null($existing_like->deleted_at)) {
    //             $existing_like->delete();
    //         } else {
    //             $existing_like->restore();
    //         }
    //     }
    // }

    public function likeTweet(Request $request)
    {
        $tweet_id = $request['tweetId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $tweet = Tweet::find($tweet_id);
        if (!$tweet) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('tweet_id', $tweet_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->tweet_id = $tweet->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}

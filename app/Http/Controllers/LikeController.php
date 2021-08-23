<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use App\Hashtag;


class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function who_like_tweet(Tweet $tweet,$id)
    {

        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        $tweet_id = Tweet::findOrFail($id);
        $tweet_likes = $tweet_id->likes()->get();

        return view('likes.index',compact('tweet_likes','retweetCount','hashtags'));
    }          

    public function store(Request $request,Tweet $tweet)
    {

        if ($tweet->likedBy($request->user())) {
            return response(null, 409);
        }

        $tweet->likes()->create([
            'user_id' => $request->user()->id,
        ]);


        return back();


    }

    public function destroy(Like $like,Tweet $tweet ,Request $request)
    {
        $request->user()->likes()->where('tweet_id', $tweet->id)->delete();

        return back();
    }
}

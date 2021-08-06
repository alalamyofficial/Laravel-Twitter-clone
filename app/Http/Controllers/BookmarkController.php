<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class BookmarkController extends Controller
{
    public function add($tweet)
    {
        //  return response()->json($tweet, 200);
        $user = Auth::user();

        $isBookmark = $user->bookmark_tweets()->where('tweet_id',$tweet)->count();

        if ($isBookmark == 0)
        {
            $user->bookmark_tweets()->attach($tweet);
            // Toastr::success('tweets successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->bookmark_tweets()->detach($tweet);
            // Toastr::success('tweets successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }

    public function show(){


        // $user = Auth::user();

        // $bookmarks = DB::table('bookmark_tweet')->where('user_id',$user_id)->get();

        // return view('bookmark_tweet',['bookmarks' => $bookmarks]);

        $tweets = Auth::user()->bookmark_tweets;
        return view('bookmark_tweet',compact('tweets'));
    }
}

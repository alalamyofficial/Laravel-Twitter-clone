<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Hashtag;
use RealRashid\SweetAlert\Facades\Alert;


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
                toast('Tweet Added To Bookmark Successfully','info');
                return redirect()->back();
        } else {
            $user->bookmark_tweets()->detach($tweet);
                toast('Tweet Removed From Bookmark Successfully','danger');
                return redirect()->back();
        }
    }

    public function show(){


        // $user = Auth::user();

        // $bookmarks = DB::table('bookmark_tweet')->where('user_id',$user_id)->get();

        // return view('bookmark_tweet',['bookmarks' => $bookmarks]);

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $tweets = Auth::user()->bookmark_tweets;
        return view('bookmark_tweet',compact('tweets','hashtags'));


    }

    // public function destroy($id){

    //     $user = Auth::user();
    //     $bookmark = $user->bookmark_tweets()->where('tweet_id',$id);
    //     $bookmark->destroy();
    //     return redirect()->back();

    // }
}

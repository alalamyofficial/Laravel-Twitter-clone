<?php

namespace App\Http\Controllers;

use App\Retweet;
use Illuminate\Http\Request;
use App\Like;

class RetweetController extends Controller
{

    public function retweet(){

        $user = Auth::user();

        $isBookmark = $user->retweeted_tweets()->where('tweet_id',$tweet)->count();

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

}

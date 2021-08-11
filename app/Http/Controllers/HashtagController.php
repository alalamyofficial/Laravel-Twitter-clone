<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;
use DB;

class HashtagController extends Controller
{
    public function index($hashtag)
    {
        $hashtag = Hashtag::where('slug', $hashtag)->first();

        $tweets = $hashtag->tweets()->latest()->paginate(10);

        return view('hashtags.index', [
            'hashtag' => $hashtag,
            'tweets'=> $tweets
        ]);
        // return redirect()->back();
    }

    public function trends(Hashtag $hashtag){

        // $hashtags = DB::table('tweet_hashtags')->get();

        // $hashtags = Hashtag::where('slug', $hashtag)->first();

        $hashtags = Hashtag::with('tweets')->withCount('tweets');

        return view('profiles.trends',compact('hashtags'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;
use DB;
use Shetabit\Visitor\Traits\Visitor;

class HashtagController extends Controller
{
    public function index($hashtag)
    {
        $hashtag = Hashtag::where('slug', $hashtag)->first();

        $retweetCount = auth()->user()->tweets()->where('id','==','original_tweet')->count();

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $hashtag_count = Hashtag::withCount('tweets')->count();

        $tweets = $hashtag->tweets()->latest()->paginate(10);

        $tweetsHashtags = Hashtag::withCount('tweets')->get();

        visitor()->visit();


        return view('hashtags.index', [
            'hashtag' => $hashtag,
            'tweets'=> $tweets,
            'retweetCount' => $retweetCount,
            'hashtags' => $hashtags,
            'tweetsHashtags'=> $tweetsHashtags,
            'hashtag_count' => $hashtag_count 
        ]);
        // return redirect()->back();
    }

    public function scopeShowTopHashtag($query)
    {
        $query->leftJoin('tweets', 'tweet.hashtag_id', '=', 'hashtag.id')
            ->selectRaw('hashtags.*, count(tweet.id) as aggregate')
            ->groupBy('hashtag.id')
            ->orderBy('aggregate', 'desc');
    }


    public function trends(Hashtag $hashtag){

        $hashtags = Hashtag::withCount('tweets')->take(3)->get();

        $tweetsHashtags = DB::table('tweet_hashtags')->where('hashtag_id')->get();

        $retweetCount = auth()->user()->tweets()->where('id','==','original_tweet')->count();

        $hashtag_count = Hashtag::withCount('tweets')->count();


        visitor()->visit();


        return view('profiles.trends',
            compact('hashtags','retweetCount','tweetsHashtags','hashtag_count')
        );

    }




}

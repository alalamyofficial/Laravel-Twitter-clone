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

        $retweetCount = auth()->user()->tweets()->where('id','==','original_tweet')->count();

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $tweets = $hashtag->tweets()->latest()->paginate(10);

        $tweetsHashtags = Hashtag::withCount('tweets')->get();


        return view('hashtags.index', [
            'hashtag' => $hashtag,
            'tweets'=> $tweets,
            'retweetCount' => $retweetCount,
            'hashtags' => $hashtags,
            'tweetsHashtags'=> $tweetsHashtags
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

    public function trends(){

        // $hashtags = DB::table('tweet_hashtags')->get();

        // $hashtags = Hashtag::where('slug', $hashtag)->first();

        // $hashtags = Hashtag::all();
        // $hashtags = Hashtag::showTopHashtag()->get();
        // $hashtags =  Hashtag::OrderBy('slug', 'DESC')->get();



        // $hashtags = Hashtag::select(DB::raw('hashtags.*, count(*) as `aggregate`'))
        //         ->join('tweets', 'hashtags.id', '=', 'tweets.hashtag_id')
        //         ->groupBy('hashtag_id')
        //         ->orderBy('aggregate', 'desc')
        //         ->get();

        // $hashtags = Hashtag::groupBy('hashtag_id')->orderBy('id', 'DESC')->count('*');

        // $hashtags = DB::table('tweet_hashtags')->pluck('hashtag_id');

        // $hashtags = DB::table('tweet_hashtags')->orderBy('id')->chunk(100, function ($users) {
   
        // });

        // $hashtags = DB::table('tweet_hashtags')->where('hashtag_id','=',1)->get();

        // $hashtags = DB::table('tweet_hashtags')->max('hashtag_id');


        // $hashtags = DB::table('tweet_hashtags')->distinct()->get();

        // $hashtags = DB::table('hashtags')
        //     ->join('tweet_hashtags', 'hashtags.id', '=', 'tweet_hashtags.hashtag_id')
        //     ->select('hashtags.*', 'tweet_hashtags.tweet_id')
        //     ->get();


        // $hashtags = Hashtag::select('id', DB::raw('COUNT(id) as count'))
        // ->groupBy('id')
        // ->orderBy('count', 'desc')
        // ->take(10);


        // favourit::with('product')
        // ->select('product_id', DB::raw('COUNT(product_id) as count'))
        // ->groupBy('product_id')
        // ->orderBy('count', 'desc')
        // ->take(10);

        // $hashtags = DB::table('tweet_hashtags')
        //         ->whereColumn('id', '!=', 'hashtag_id')
        //         ->get();

        // $hashtags = Hashtag::sortBy('slug');

        // $hashtags = Hashtag::withCount('tweets')->take(3)->get();
        $hashtags = Hashtag::withCount('tweets')->take(3)->get();

        $tweetsHashtags = DB::table('tweet_hashtags')->where('hashtag_id')->get();

        $retweetCount = auth()->user()->tweets()->where('id','==','original_tweet')->count();


        return view('profiles.trends',
            compact('hashtags','retweetCount','tweetsHashtags')
        );
    }


}

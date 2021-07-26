<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Flasher\Prime\FlasherInterface;
use RealRashid\SweetAlert\Facades\Alert;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $tweets = Tweet::where('following_user_id', 1)->with('following')->first()->following->each->tweets;

        $tweets = Tweet::latest()->get(); 



        return view('tweets.index',[

            'tweets' => auth()->user()->timeline()

            // 'tweets' => $tweets
            

        ]);
        // response()->json($tweets,200)
    }



    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $this->validate($request,
            
            ['body']
        
        );

        $tweet = new Tweet;

        $tweet->user_id = auth()->id();

        $tweet->body = $request->body;

        $tweet->save();

        // $flasher->addInfo('Tweet is Added');
        toast('Your Tweet is submited!','info');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        $tweets = Tweet::latest()->get();
    
        return response()->json($tweets,200);

        
        
        // ->with('tweets',current_user()->timeline());

        // return view('tweets.index',[

        //     'tweets' => auth()->user()->timeline()

        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        //
    }

    
    public function UserTweets()
    {
        $tweets = Tweet::latest()->get();

        // return view('public_tweet_panel',compact('userTweet'));

        return view('public_tweet_panel',[

            'tweets' => auth()->user()

        ]);

    }

}

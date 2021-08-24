<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Flasher\Prime\FlasherInterface;
use RealRashid\SweetAlert\Facades\Alert;
use App\Like;
use DB;
use App\Hashtag;
use Shetabit\Visitor\Traits\Visitor;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tweet $tweet)
    {

        // $tweets = Tweet::where('following_user_id', 1)->with('following')->first()->following->each->tweets;

        $tweets = Tweet::with('user','likes','comments','hashtags','retweet')->latest()->get(); 
        // $retweetCount = Tweet::where('retweet','==', 1 )->count();
        $retweetCount = auth()->user()->tweets()->where('id','==','original_tweet')->count();
        // $retweetCount = Tweet::withCount('retweets')
        // ->orderBy('created_at', 'desc')
        // ->get();
     
        // $hashtags = Hashtag::latest()->get();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        // $tweet_id = Tweet::select('id')->get()->pluck('id');

        visitor()->visit();

        return view('tweets.index',[

            'tweets' => auth()->user()->timeline(),

            'retweetCount' => $retweetCount,

            'hashtags' => $hashtags,

            

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
            
            [
                'body'=>'sometimes',
                'image'=>'sometimes',
            ]
        
        );

        $tweet = new Tweet;

        $hashtags = $this->extractHashtags($request->input('body'));

        
        if ($request->hasFile('image')) {
            
            $tweet->user_id = auth()->id();
    
            $tweet->body = $request->body;
    
    
            $img_file = $request->image;

            $new_image = time().$img_file->getClientOriginalName();

            $img_file->move('public/storage/imgs/',$new_image);

            $tweet->image = 'public/storage/imgs/'.$new_image;

            $tweet->save();


            foreach ($hashtags as $singleHashtag){
                $hashtag = Hashtag::firstOrCreate(['slug' => $singleHashtag]);
                $tweet->hashtags()->attach($hashtag);
            }

        }
        else
        {
            $tweet->user_id = auth()->id();
    
            $tweet->body = $request->body;

            $tweet->save();


            foreach ($hashtags as $singleHashtag){
                $hashtag = Hashtag::firstOrCreate(
                    ['slug' => $singleHashtag]
                );
                $tweet->hashtags()->attach($hashtag);
            }

        }    



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
    public function destroy(Tweet $tweet,$id)
    {
        $mytweet = Tweet::findOrFail($id);
        $mytweet->destroy($id);
        return back(); 
    }

    
    public function UserTweets()
    {
        $tweets = Tweet::latest()->get();

        // return view('public_tweet_panel',compact('userTweet'));

        return view('public_tweet_panel',[

            'tweets' => auth()->user()

        ]);

    }

    public function single_tweet($tweet_id){

        
        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $tweets  = Tweet::where('id',$tweet_id)->get();

        visitor()->visit();


        return view('single_tweet',compact('tweets','retweetCount','hashtags'));

    }


    public function extractHashtags($body)
    {
        preg_match_all("/(#\w+)/u", $body, $matches);

        if( $matches ){
            $hashtagsValues = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsValues);
        }

        array_walk($hashtags, function(&$value){
            $value = str_replace("#", "", $value);
        });

        return $hashtags;
    }


}

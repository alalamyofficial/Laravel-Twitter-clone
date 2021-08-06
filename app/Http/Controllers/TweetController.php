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
            
            [
                'body'=>'sometimes',
                'image'=>'sometimes',
            ]
        
        );

        $tweet = new Tweet;

        
        if ($request->hasFile('image')) {
            
            $tweet->user_id = auth()->id();
    
            $tweet->body = $request->body;
    
    
            $img_file = $request->image;

            $new_image = time().$img_file->getClientOriginalName();

            $img_file->move('public/storage/imgs/',$new_image);

            $tweet->image = 'public/storage/imgs/'.$new_image;

        }
        else
        {
            $tweet->user_id = auth()->id();
    
            $tweet->body = $request->body;

        }    


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

        $tweets  = Tweet::where('id',$tweet_id)->get();


        return view('single_tweet',compact('tweets'));

    }

    public function storeLike(Tweet $tweet) {

        // if($tweet->likesCount() == 0 || $tweet->likesCount() == 1 )
        // {
                
        //     $tweet->like();
        //     return redirect()->back();

        // }
        // elseif($tweet->likesCount() == 1){

        //     $this->destroyLike($tweet);   
        //     return redirect()->back();
        // }

        // else{

        //     $this->destroyLike($tweet);   
        //     return redirect()->back();
        // }
        
        // return redirect()->back();
        $data = $tweet->like();
        return response()->json($data, 200);

    }

    public function destroyLike(Tweet $tweet) {

        $data = $tweet->unlike();
        return response()->json($data, 200);
        // return redirect()->back();

    }

    public function toggleLike(Tweet $tweet){

        if($tweet->likesCount() == 1 || $tweet->likesCount() == 0){

            $likeable_type	= 'App/Tweet';

            $this->storeLike($tweet);
            return redirect()->back();
            
        }
        
        else{
            
            $this->destroyLike($tweet);   
            return redirect()->back();

        }


    }

    // public function toggle(Tweet $tweet){

    //     current_user()->toggleLike($tweet);


    // }

    // public function storeLike(Tweet $tweet) {

    //     $data = current_user()->toggleLike($tweet);
    //     return response()->json($data, 200);

    // }
}

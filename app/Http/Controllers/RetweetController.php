<?php

namespace App\Http\Controllers;

use App\Retweet;
use Illuminate\Http\Request;
use App\Like;
use App\Tweet;
use App\User;
use Auth;
use DB;

class RetweetController extends Controller
{

	// public function create($source_tweet_id)
	// {
    //     $source_tweet = Tweet::findOrFail($source_tweet_id);

<<<<<<< HEAD
    //     $hashtags = $this->extractHashtags(request()->input('body'));



    //     $tweet = new Tweet();
       
    //     if (request()->hasFile('image')) {
            
    //         $tweet->user_id = User::getCurrent()->id;
    
    //         $tweet->body = $source_tweet->body;
    
    
    //         $img_file = request()->image;

    //         $new_image = time().$img_file->getClientOriginalName();

    //         $img_file->move('public/storage/imgs/',$new_image);

    //         $tweet->image = 'public/storage/imgs/'.$new_image;

    //         $tweet->save();


    //         foreach ($hashtags as $singleHashtag){
    //             $hashtag = Hashtag::firstOrCreate(['slug' => $singleHashtag]);
    //             $tweet->hashtags()->attach($hashtag);
    //         }

    //     }
    //     else
    //     {
    //         $tweet->user_id = User::getCurrent()->id;
    
    //         $tweet->body = $source_tweet->body;

    //         $tweet->save();


    //         foreach ($hashtags as $singleHashtag){
    //             $hashtag = Hashtag::firstOrCreate(
    //                 ['slug' => $singleHashtag]
    //             );
    //             $tweet->hashtags()->attach($hashtag);
    //         }

    //     }    


    //         $retweet = new Retweet();
    //         $retweet->source_tweet_id = $source_tweet_id;
    //         $retweet->tweet_id = $tweet->id;
    //         $retweet->save();

    //         return back();
    // }
    
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

    // public function create(User $user, Tweet $tweet ,$source_tweet_id)
	// {
    //     $sourceTweet = Tweet::findOrFail($source_tweet_id);

    //     // $tweet = new Tweet();
    //     // $tweet->user_id =  User::getCurrent()->id;
    //     // $tweet->body = $sourceTweet->body;
    //     // $tweet->image = $sourceTweet->image;
    //     // $tweet->save();
        
    //     $retweet = new Retweet();
    //     $retweet->owner_tweet_id = $sourceTweet->user->username;
    //     $retweet->user_id =  Auth::user()->username;
    //     // $retweet->user_id = DB::table('tweets')->where('user_id','=',$user->id)->get();
    //     $retweet->source_tweet_id = $source_tweet_id;
    //     $retweet->tweet_id = $sourceTweet->id;
    //     $retweet->save();

    //     return back();
    
    // }

    public function all_retweets(){

        $myretweets = Retweet::latest()->get();

        return view('retweet',compact('myretweets'));

    }

    // public function Retweet($id){
        
    //     $retweet = Tweet::find($id);
    //     $retweet->retweets_total = $retweet->retweet_total + 1;
    //     $retweet->save();

    //     $retweet->userRetweeted()->toggle([Auth::user()->id]);

    //     return redirect()->back();
    // }
    // public function noRetweet($id){
        
    //     $retweet = Retweet::find($id);
    //     $retweet->retweets_total = $retweet->retweet_total - 1;
    //     $retweet->save();

    //     $retweet->userRetweeted()->toggle([Auth::user()->id]);

    //     return redirect()->back();
    // }

    public function store($id) {

        $tweet = Tweet::findOrFail($id);

        $newRetweet = auth()->user()->tweets()->create([
            'retweet'=> 1,
            'body'=> $tweet->body,
            'image' => $tweet->image ?? null,
            'original_tweet'=> $id,
        ]);

        $newRetweet->original_tweet = $id;
        $newRetweet->owner_tweet_id = $tweet->user->id;
        $newRetweet->save();
=======
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
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d

        return redirect()->back();
    }

}

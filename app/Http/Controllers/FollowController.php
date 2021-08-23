<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use App\Hashtag;
use DB;
use Auth;


class FollowController extends Controller
{
    public function store(User $user){

         current_user()->toggleFollow($user);

         return back();

    }

    public function getFollowings(User $user , $id){

                
      $retweetCount = Tweet::where('original_tweet','=',1)->count();
      $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $user_s = User::findOrFail($id);
        $followings = $user_s->follows()->get();
        return view('followers.following',[
          'followings' => $followings,
          'retweetCount'=> $retweetCount,
          'hashtags' => $hashtags
        ]);
    }

    public function getFollowers(User $user , $id){

              
      $retweetCount = Tweet::where('original_tweet','=',1)->count();
      $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

      $user_s = User::findOrFail($id);
      $followers = $user_s->user_followers()->get();	
      return view('followers.followers',[
            'followers' => $followers,
            'retweetCount'=> $retweetCount,
            'hashtags' => $hashtags
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;


class FollowController extends Controller
{
    public function store(User $user){

         current_user()->toggleFollow($user);

         return back();

    }

    public function getFollowings(User $user , $id){

        $user_s = User::findOrFail($id);
        $followings = $user_s->follows()->get();
        return view('followers.following',[
          'followings' => $followings
        ]);
    }

    public function getFollowers(User $user , $id){
      $user_s = User::findOrFail($id);
      $followers = $user_s->user_followers()->get();	
      return view('followers.followers',[
            'followers' => $followers
        ]);
    }


}

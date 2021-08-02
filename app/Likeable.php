<?php


namespace App;

use App\User;

trait Followable{

    public function like_relationship(){

        return $this->belongsToMany(User::class, 'likes', 'user_id', 'tweet_id');
    }

    public function user_like_relationship(){

        return $this->belongsToMany(User::class,'likes','tweet_id','user_id');

    }

    public function like(User $user){

        return $this->like_relationship()->save($user);

    }

    public function unlike(User $user){

        return $this->like_relationship()->detach($user);

    }

    public function liking(User $user){

        return $this->like_relationship()->where('tweet_id',$user->id)->exists();

    }

    public function toggleLike(User $user){

        $this->like_relationship()->toggle($user);

    }


}
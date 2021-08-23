<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;
use App\Retweet;

class Tweet extends Model 
{

    use HasLikes;


    protected $fillable = ['user_id','body','image','likeable_id','retweet'];

    protected $table = 'tweets';


    public function user(){

        return $this->belongsTo(User::class);

    }


    public function likedUsers()
    {
        return $this->belongsToMany(User::class);
    } 
    

    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function bookmark_to_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class,'tweet_hashtags','tweet_id');
    }

<<<<<<< HEAD
    // public function retweets()
    // {
    //     return $this->hasMany(Retweet::class ,'source_tweet_id');
    // }

    // public function source()
    // {
    //     return $this->hasOne('App\Retweet','tweet_id');
    // }

    // public function retweetBy(User $user)
    // {
    //     $retweet = Retweet::where('source_tweet_id', '=', $this->id)
    //         ->join('tweets', function($join)
    //         {
    //             $join->on('tweets.id', '=', 'retweets.tweet_id');
    //         })
    //         ->join('users', function($join)
    //         {
    //             $join->on('users.id', '=', 'tweets.user_id');
    //         })->get();

    //     if($retweet->isEmpty())
    //         return false;
    //     return $retweet->first();
    // }

    // public function userRetweeted()
    // {
    //     return $this->belongsToMany('App\User', 'retweets', 'tweet_id', 'user_id')->withTimestamps();
    // }

    public function retweet() {
        // return $this->retweet;
        return $this->hasMany(Retweet::class);

    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }


=======
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d
}

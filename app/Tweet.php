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


    public function retweet() {
        return $this->hasMany(Retweet::class);

    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }


}

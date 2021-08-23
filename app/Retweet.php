<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tweet;

class Retweet extends Model
{


    protected $table = 'retweets';

    // protected $fillable = ['user_id','source_tweet_id','tweet_id'];

    protected $guarded = array('id');


    // public function user(){

    //     return $this->belongsTo(User::class,'user_id');

    // }

    // public function tweet()
    // {
    //     return $this->belongsTo('App\Tweet','tweet_id');
    // }

    public function source()
    {
        return $this->belongsTo('App\Tweet', 'source_tweet_id');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class,'tweet_hashtags','tweet_id');
    }


    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->morphedByMany('App\User', 'reposts');
    }

    /**
     * connect all of the posts that were reposted 
     */
    public function tweets()
    {
        return $this->morphedByMany('App\Tweet', 'reposts');
    }

}

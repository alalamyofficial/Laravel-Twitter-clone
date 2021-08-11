<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    public $fillable = [

        'user_id',
        'tweet_id',
        'tweeted_id',

    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function tweet(){

        return $this->belongsTo(Tweet::class);

    }

    public function retweets()
    {
        return $this->hasMany('App\Retweet');
    }
}

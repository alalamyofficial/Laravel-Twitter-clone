<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tweet;

class Comment extends Model
{

    protected $fillable = [ 
        'user_id',
        'tweet_id',
        'comment',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }

    public function retweet()
    {
        return $this->belongsTo('App\Retweet');
    }
}

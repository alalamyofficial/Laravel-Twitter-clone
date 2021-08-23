<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{

    protected $fillable = ['slug'];


    public function tweets()
    {
        return $this->belongsToMany(Tweet::class,'tweet_hashtags');
    }
}

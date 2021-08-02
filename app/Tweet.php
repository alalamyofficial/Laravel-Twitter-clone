<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweet extends Model
{
    protected $fillable = ['user_id','body','image'];

    
    // public $with = ['user','likes'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    // public function likes(){

    //     return $this->hasMany(Like::class);

    // }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class);
    } 
    
    public function likes()
    {
        return $this->belongsToMany('App\Like');
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

}

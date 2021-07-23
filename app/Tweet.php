<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['user_id','body'];

    
    // public $with = ['user','likes'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function likes(){

        return $this->hasMany(Like::class);

    }
}

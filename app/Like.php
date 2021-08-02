<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Like extends Model
{
    use SoftDeletes;


    // public $with = ['user'];


    protected $fillable = [

        'user_id','tweet_id','like'
    ];

    public function tweets(){

        return $this->belongsTo(Tweet::class);

    }

    public function users(){

        return $this->belongsTo(user::class);

    }
}

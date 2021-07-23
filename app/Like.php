<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public $with = ['user'];


    protected $fillable = [

        'user_id','post_id','like'
    ];

    public function tweets(){

        return $this->belongsTo(Tweet::class);

    }

    public function users(){

        return $this->belongsTo(Tweet::class);

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id','likeable_id','likeable_type'];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function tweet(){

        return $this->belongsTo(Tweet::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlueVerifiy extends Model
{
    protected $fillable = ['user_id','order_message'];

    public function user(){

        return $this->belongsTo(User::class);

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = ['task'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\User;

class User extends Authenticatable
{
    use Notifiable , Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute(){

        return "https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png";

    }

    public function tweets(){

        return $this->hasMany(Tweet::class)->latest();

    }

    public function getRouteKeyName(){

        return 'username';

    }

    public function likes(){

        return $this->hasMany(Like::class);

    }

    public function timeline(){

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id',$friends)
        ->orWhere('user_id',$this->id)->latest()->paginate(50);

    }

}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CommentNotifications;
use App\User;
use DB;
use App\Comment;
use App\Tweet;
use App\Like;
use Auth;

class User extends Authenticatable
{
    use Notifiable , Followable , HasLikes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','cover','avatar','bio','country','verified','role_as'
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

    public function getAvatarAttribute($value){

        return asset($value ? : "user.png");

    }

    public function getCoverAttribute($value){

        return asset($value ? : "https://i.pinimg.com/originals/a1/4b/99/a14b99685158aa23e2117ed121a35dce.jpg");

    }

    public function tweets(){

        return $this->hasMany(Tweet::class)->latest();

    }

    public function getRouteKeyName(){

        return 'username';

    }

    // public function likes(){

    //     return $this->hasMany(Like::class);

    // }

      public function likedTweets()
      {
          return $this->belongsToMany(Tweet::class);
      }  



    public function timeline(){

        $friends_id = $this->follows()->pluck('users.id');

         return Tweet::whereIn('user_id', $friends_id)
            ->orWhere('user_id', $this->id)
            ->orderByDesc('id')
            ->paginate(50);

        // return Tweet::all();

        // return DB::table('tweets')
        // ->select('users.email', 'users.name', 'tweets.body')
        // ->leftJoin('follows', 'tweets.user_id', '=', 'follows.following_user_id')
        // ->leftJoin('users', 'tweets.user_id', '=', 'users.id')
        // ->where('follows.user_id', $this->id)
        // ->orWhere('tweets.user_id', $this->id)
        // ->latest('tweets.created_at')
        // ->get();

        // return Tweet::where('user_id', $this->id)
        // ->orWhereHas('user', function ($query) {
        //     $query->whereHas('follows', function ($query) {
        //         $query->where('user_id', $this->id);
        //     });
        // })
        // ->latest()
        // ->get();

    }

    public function ourtimeline(){

        $following_id = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $following_id)
        ->latest()->paginate(50);
        // ->orderBy('user_id', 'ASC')->get();



        // return Tweet::whereIn('user_id',$friends)
        // ->orWhere('user_id',$this->id)->latest()->paginate(50);

    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = \Hash::make($password);
    // }
    

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // public function likes()
    // {
    //     return $this->belongsToMany('App\Tweet', 'likes', 'user_id', 'tweet_id');
    // }
    // public function likes()
    // {
    //     return $this->belongsToMany('App\Like','likes');
    // }

    public function bookmark_tweets()
    {
        return $this->belongsToMany('App\Tweet','bookmark_tweet')->withTimestamps();
    }

    // public function like(){
    //     return $this->hasMany('App\Like','likes','user_id','id');
    //   }
  
    //   public function userLikes(){
    //     return $this->belongsToMany('App\Tweet', 'likes','user_id','tweet_id');
    //   }
  
    //   public function isLiking(Tweet $tweet)
    //   {
    //       return !is_null($this->userLikes()->where('user_id', $tweet->user_id)->first());
    //   }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // public function retweets()
    // {
    //     return $this->hasMany('App\Retweet');
    // }


    // public function retweets()
    // {
    //     return $this->hasMany(Retweet::class ,'source_tweet_id');
    // }

    public function retweedTweets()
    {
        return $this->belongsToMany('App\User', 'retweets', 'user_id', 'retweet_id')->withTimestamps();
    }

    public static function getCurrent()
    {
    	if (Auth::check())
    		return User::find(Auth::id());
    	return false;
    }

    public function retweets()
    {
        return $this->hasMany('App\Retweet');
    }

    public function lists()
    {
        return $this->hasMany('App\Lists');
    }


    public function retweeted_tweets()
    {
        return $this->belongsToMany('App\Retweet','retweets')->withTimestamps();
    }

    public function verifiy()
    {
        return $this->hasMany(BlueVerifiy::class);
    }
}

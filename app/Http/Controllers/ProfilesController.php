<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\CommentNotifications;
use App\Retweet;
use App\Hashtag;
use Shetabit\Visitor\Traits\Visitor;

class ProfilesController extends Controller
{
    public function show(User $user){

        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        $mytweet = $user->tweets()->where('image' , '!=' , NULL )->paginate(6);

        visitor()->visit();

        return view('profiles.show')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->paginate(10))
        ->with('retweetCount',$retweetCount)
        ->with('hashtags',$hashtags)
        ->with('mytweet',$mytweet);

    }

    public function edit(User $user){

        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        $this->authorize('edit',$user);
        
        visitor()->visit();

        return view('profiles.edit',compact('user','retweetCount','hashtags'));

    }

    public function update(User $user){

        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],

            'name' => ['string', 'required', 'max:255'],

            'avatar' => ['file'],

            'cover' => ['file'],

            'bio' => ['string','max:500'],

            'country' => ['string'],

            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
                //will ignore current user , Rule for unique
            ],

            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);


        if (request('avatar')) {

            $avatar_file = request('avatar');

            $new_avatar = time().$avatar_file->getClientOriginalName();

            $avatar_file->move('public/storage/avatars/',$new_avatar);

            $attributes['avatar'] = 'public/storage/avatars/'.$new_avatar;
        }

        if (request('cover')) {

            $cover_file = request('cover');

            $new_cover = time().$cover_file->getClientOriginalName();

            $cover_file->move('public/storage/avatars/',$new_cover);

            $attributes['cover'] = 'public/storage/avatars/'.$new_cover;
        }


        $user->update($attributes);

        toast('Your Profile has been edited!','info');



        return redirect()->route('profile',compact('user'));

    }

    public function grid_tweets(){

        $mytweet = $user->tweets()->where('image' , '!=' , NULL )->limit(6)->get();
        // $mytweet = null;
        return view('grid_photos',compact('mytweet'));

    }

    public function media_tweets(User $user){
        
        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        
        visitor()->visit();

        return view('profiles.tweets.media')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->where('image' , '!=' , NULL )->paginate(10))
        ->with('retweetCount',$retweetCount)
        ->with('hashtags',$hashtags);
        ;
        

    }

    public function like_tweets(User $user){
        
        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        visitor()->visit();

        return view('profiles.tweets.like')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->whereHas('likes')->paginate(10))
        ->with('retweetCount',$retweetCount)
        ->with('hashtags',$hashtags);
        ;



    }


    public function group_tweets(User $user){
        
        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        visitor()->visit();

        return view('tweet_group')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->where('image' , '!=' , NULL )
        ->with('retweetCount',$retweetCount)
        ->orderBy('created_at','desc')->take(6)->get())
        ->with('hashtags',$hashtags);



    }   

    public function retweets(User $user){

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        
        visitor()->visit();

        return view('profiles.tweets.retweet')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->where('retweet' , '=' , 1)
        ->paginate(10))
        ->with('hashtags',$hashtags);

    }

    
    public function unreadNotifications()
    {
        $unreadNotifications = Auth::user()->unreadNotifications;
        return response()->json($unreadNotifications);
    }

    public function markAsRead()
    {

        Auth::user()->notifications->markAsRead();
        return response()->json('success');
    }

    public function all_notifications(){

        visitor()->visit();

        return view('notifications');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use App\Hashtag;

class SearchController extends Controller
{
   
    public function search(Request $request){

        $retweetCount = Tweet::where('original_tweet','=',1)->count();
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $key = trim($request->get('q'));

        $users = User::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('username', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        $tweets = Tweet::query()
            ->where('body', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();
    

        // Return the search view with the resluts compacted
        return view('searched_result', compact('query','hashtags','users','tweets'));
    }
    
}

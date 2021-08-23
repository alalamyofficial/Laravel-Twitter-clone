<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hashtag;

class ExplorerController extends Controller
{
    public function users(){

        $users = User::all();

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();


        return view('explore',compact('users','hashtags'));

    }

}

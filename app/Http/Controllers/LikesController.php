<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikesController extends Controller
{
    public function store(Request $request){

        $like = new Like;

        $like->user_id = Auth::id();
        $like->post_id = $request->tweets()->id;

        $like->save();

    }
}

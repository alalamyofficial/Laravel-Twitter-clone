<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExplorerController extends Controller
{
    public function users(){

        $users = User::all();

        return view('explore',compact('users'));

    }

}

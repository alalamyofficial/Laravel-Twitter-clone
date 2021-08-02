<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class NotificationController extends Controller
{
    public function all_notifications(){


        return view('notifications');

    }
}

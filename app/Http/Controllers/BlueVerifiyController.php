<?php

namespace App\Http\Controllers;

use App\BlueVerifiy;
use Illuminate\Http\Request;
use Auth;
use App\Hashtag;
use Shetabit\Visitor\Traits\Visitor;

class BlueVerifiyController extends Controller
{

    public function index()
    {

        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        $orders = BlueVerifiy::where('user_id','=',Auth::user()->id)->with('user')->latest()->get();

        visitor()->visit();

        return view('blue_verifiy',compact('hashtags','orders'));

    }

    public function store(Request $request)
    {
        
        $this->validate($request,[

            // 'user_id' => 'required',
            'order_message' => 'required'

        ]);

        $order = new BlueVerifiy;

        $order->user_id = Auth::user()->id;
        $order->order_message = $request->order_message;

        $order->save();

        return redirect()->back();

    }

}

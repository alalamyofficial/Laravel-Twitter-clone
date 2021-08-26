<?php

namespace App\Http\Controllers;

use App\Lists;
use Illuminate\Http\Request;
use App\Hashtag;
use Shetabit\Visitor\Traits\Visitor;


class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Lists::where('user_id','=',Auth::user()->id)->latest()->paginate(10);
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();

        visitor()->visit();

        return view('lists',compact('tasks','hashtags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'task' => 'required'

        ]);

        $task = new Lists;
        
        $task->task = $request->task;

        $task->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function show(Lists $lists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function edit(Lists $lists,$id)
    {
        $hashtags = Hashtag::withCount('tweets')->limit(3)->latest()->get();
        $task = Lists::findOrFail($id);
        return view('edit_lists',compact('hashtags','task'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lists $lists, $id)
    {
        $this->validate($request,[

            'task' => 'required'

        ]);

        $task = Lists::findOrFail($id);
        
        $update_list = [

            'task' => $request->task

        ];

        $task->update($update_list);


        return redirect()->route('list');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lists $lists,$id)
    {
        
        $task = Lists::findOrFail($id);
        $task->delete($id);
        return redirect()->back();

    }
}

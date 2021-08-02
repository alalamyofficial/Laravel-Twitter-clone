<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Auth;
use App\Notifications\CommentNotifications;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
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
        //
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

            'comment'   => 'required',
            'user_id'   => 'required',
            'tweet_id'   => 'required'


        ]);

        $comment = new Comment;

        $comment->insert([
            'comment'   => $request->comment,
            'user_id'   => $request->user_id,
            'tweet_id'   => $request->tweet_id
        ]);

        // $comment->user_id = Auth::id();
        // $comment->tweet_id = $request->tweet_id;
        // $comment->comment = $request->comment;
        
        $users = User::all();
        $comment_status = 'New Comment';
        $comment_id = $comment->id;
        $tweet = Tweet::findOrFail($request->tweet_id);

        foreach($users as $user){
            if($user->id !== Auth::user()->id){
                $user->notify(new CommentNotifications(Auth::user(), $comment_id, $request->tweet_id ,$comment_status, $request->comment, $tweet->body));
            }
        }

        $comment->save();


        return response()->json($comment);

        
    }

    public function getComments(Tweet $tweet)
    {
        return response()->json($tweet->comments()->with('user')->latest()->get());
    }

    public function addComment(Request $request , $tweet){

        // return $request->all();

        $this->validate($request,[
            'comment' => 'required'
        ]);

        //to store notifications
        $comment = new Comment();
        $comment->tweet_id = $tweet;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        
        
        //variables for notifications
        $users = User::all();
        $comment_status = 'New Comment';
        $comment_id = $comment->id;
        $tweet = Tweet::find($request->tweet_id);
        
        
        foreach($users as $user){
            if($user->id !== Auth::user()->id){
                $user->notify(new CommentNotifications(Auth::user(), $comment_id ,$comment_status, $request->comment , $request->tweet_id));
            }
        }
        $comment->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function unreadNotifications()
    {
        $unreadNotifications = Auth::user()->unreadNotifications;
        return response()->json($unreadNotifications);
    }

    public function markAsRead()
    {
        $users = User::user()->get();

        Auth::user()->notifications->markAsRead();
        return response()->json('success');
    }

    public function all_notifications(){


        return view('notifications');

    }
}

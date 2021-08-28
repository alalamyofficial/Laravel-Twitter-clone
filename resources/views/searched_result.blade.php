@extends('layouts.app')

@section('content')


<div>
    <h3>Results</h3><br><hr><br> 

    <h4>Users</h4><br>

    @foreach ($users as $user)
        <a href="{{route('profile',$user)}}" class="flex items-center mb-5">
            <img src="{{ $user->avatar }}"
                    alt="{{ $user->name }}'s avatar"
                    width="60"
                    class="mr-4 rounded"
            >

            <div>
                <h4 class="font-bold">{{$user->name}}</h4>
            </div>
        </a>
    @endforeach

    <hr><br>

    <h4>Tweets</h4><br>

    @foreach ($tweets as $tweet)
    <div class="flex p-4 border-b border-b-gray-400 }} ">

    <div class="mr-3 flex-shrink-0">

        <a href="{{route('profile',$tweet->user)}}">

            <img src="{{$tweet->user->avatar}}" alt="" class="rounded-full mr-2"
            style="width:50px; height:50px">
        
        </a> 

    </div>



    <div>

    <h5 class="font-bold mb-4">

    <div class="flex justify-between"> 
    <a href="{{route('profile',$tweet->user)}}" class="mr-5">
    <!-- if getRouteKey not found will e ==>  $tweet->user->name , this is called forign key-->
        {{$tweet->user->username}}
    </a>

    <p class="text-sm mr-3">
        <a href="{{route('single_tweet',$tweet->id)}}">

            {{ $tweet->created_at->diffForHumans() }}
        </a>    
    </p>

    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle dropdown-toggle-split ml-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        
        <div class="dropdown-menu">

            <a class="dropdown-item">
                <form action="{{route('tweet.bookmark',$tweet->id)}}" method="post">
                    @csrf
                        <div class="flex">
                            <i class="fas fa-bookmark" style="color:#b7b7b3"></i> 
                            <button type="submit" class="ml-2" style="color:#b7b7b3">Bookmark</button>
                        </div>
                </form>
            </a>

            @can('tweet_action',$tweet->user)


            <a class="dropdown-item" href="#">
                <div class="flex">
                    <i class="fas fa-edit" style="color:#b7b7b3"></i> 
                    <p class="ml-2" style="color:#b7b7b3">Edit</p>
                </div>
            </a>

            @endcan


            @can('tweet_action',$tweet->user)

            <a class="dropdown-item">
                <form action="{{route('tweet.destroy',$tweet->id)}}" method="post">
                    @method('delete')
                    @csrf
                        <div class="flex">
                            <i class="fas fa-trash" style="color:#b7b7b3"></i> 
                            <button type="submit" class="ml-2" style="color:#b7b7b3">Delete</button>
                        </div>
                </form>
            </a>
            @endcan

        </div>
    </div>

    </div>
    </h5>
        
    <p class="text-sm mb-3">

    {{$tweet->body}}


    </p><br>


    <a href="{{route('single_tweet',$tweet->id)}}">

    <img class="pb-3" src="{{asset($tweet->image)}}" alt="" style="width:600px">

    </a> 


    <div class="flex justify-between">

    <div class="flex">
    <button class="" type="submit" data-toggle="collapse" data-target="#view-comments-{{$tweet->id}}" aria-expanded="false" aria-controls="collapseExample">
        <i class="far fa-comment"></i></i>                
    </button> 
    <p>{{count($tweet->comments)}}</p>
                
    </div>

    <div class="flex">
    <button><i class="fas fa-retweet"></i></button>
    </div>


    <div class="flex">

        @auth
            @if (!$tweet->likedBy(auth()->user()))
                <form action="{{ route('tweet.like', $tweet) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">
                        <i class="far fa-heart"></i>
                    </button>
                        <a href="{{route('tweet.likes',$tweet->id)}}" 
                            >
                            {{ $tweet->likes->count() }}
                        </a> 
                    
                </form>
            @else
                <form action="{{ route('tweet.like', $tweet) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">
                        <i class="far fa-heart fill-current text-red-600"></i>
                    </button>
                        <a href="{{route('tweet.likes',$tweet->id)}}" 
                            
                            data-id="{{ $tweet->id }}"
                        >
                            {{ $tweet->likes->count() }}

                        </a> 
                </form>
            @endif
        @endauth


    </div>    


    </div>   


    </div>

    </div>

    <br>
    <div class="mb-3">
    Reply to <a href="{{route('profile',$tweet->user)}}">{{$tweet->user->username}}</a>
    </div>

    @include('comments.create')
        @endforeach



    </div>

@endsection
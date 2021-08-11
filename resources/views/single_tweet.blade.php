@extends('layouts.app')

@section('content')

@foreach($tweets as $tweet)

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
            
            <!-- <a href="{{route('single_tweet',$tweet->id)}}">
                <div class="flex">
                    <button><i class="far fa-comment"></i></i></button> 
                    <p class="">10</p>
                </div>
            </a> -->
            <div class="flex">
                <button class="" type="submit" data-toggle="collapse" data-target="#view-comments-{{$tweet->id}}" aria-expanded="false" aria-controls="collapseExample">
                    <i class="far fa-comment"></i></i>                
                </button> 
                <p>{{count($tweet->comments)}}</p>
                            
            </div>

            <div class="flex">
                <button><i class="fas fa-retweet"></i></button>
                <p>10</p>
            </div>


            <!-- <div class="flex">

                <a href="#" class="like"><i class="far fa-thumbs-down"></i></a>
                <p>10</p>

            </div> -->

            <!-- <a href="tweet/like" class="like">Like</a>
            <a href="#" class="like">Dislike</a> -->


            <div class="flex">

                <form action="{{route('tweets.likes.store',$tweet->id)}}" method="post">
                @csrf
                    <button type="submit"><i class="far fa-thumbs-up"></i></button>

                </form>
                <b>{{$tweet->likesCount()}} </b> 
                </div>    

                <form action="{{route('tweets.likes.destroy',$tweet->id)}}" method="post">
                @csrf
                @method('delete')
                    <button type="submit"><i class="far fa-thumbs-down"></i></button>

                    </form> 

            </div>   


            </div>

        </div>

        <br>
        <div class="mb-3">
            Reply to <a href="{{route('profile',$tweet->user)}}">{{$tweet->user->username}}</a>
        </div>
        
        @include('comments.create')

@endforeach

@endsection

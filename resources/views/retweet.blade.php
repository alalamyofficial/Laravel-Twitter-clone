@extends('layouts.app')

@section('content')

@foreach($myretweets as $tweet)

<div class="p-4">

    @if ($tweet->source)
        <div class="flex">
            Retweeted from
            <a class="retweet-source" souce-id="{{$tweet->source->id}}">
                <div class="flex">

                    <img src="{{asset($tweet->source->user->avatar)}}" alt="" 
                    class="rounded-full ml-2 mr-2" style="width:30px; height:30px">
                    {{urldecode('%40')}}{{$tweet->source->user->username}}
                
                </div>
            </a>
        </div>
    @endif

</div>

<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400' }} ">

        <div class="mr-3 flex-shrink-0">

            <a href="">
        
                    <img src="{{$tweet->user['avatar']}}" alt="" class="rounded-full mr-2"
                    style="width:50px; height:50px"> 
            
            </a> 

        </div>
     


    <div>

        <h5 class="font-bold mb-4">
            

            <div class="flex justify-between"> 
                <a href="" class="mr-5">
                <!-- if getRouteKey not found will e ==>  $tweet->user->name , this is called forign key-->
                    {{$tweet->user_id}}
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

            <br>


            
            <p class="text-sm mb-3">

                {{$tweet->tweet->body}}
                <img src="{{asset($tweet->tweet->image)}}" alt="">


            </p><br>

            
            <a href="{{route('single_tweet',$tweet->id)}}">

                <img class="pb-3" src="{{asset($tweet->image)}}" alt="" style="width:400px">

            </a> 


            <div class="flex justify-between">
            
                <div class="flex">
                    <button class="" type="submit" data-toggle="collapse" data-target="#view-comments-{{$tweet->id}}" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-comment"></i></i>                
                    </button> 
                    <p></p>
                                
                </div>

                <div class="flex">
                    <form action="{{route('retweet.create',$tweet->id)}}" method="get">
                        <button><i class="fas fa-retweet"></i></button>
                    
                    </form>
                </div>


                <div class="flex">

                    <form action="{{route('tweets.likes.store',$tweet->id)}}" method="post">
                    @csrf
                        <button type="submit"><i class="far fa-thumbs-up"></i></button>
    
                    </form>
                    <b> </b> 
                </div>    

                <form action="{{route('tweets.likes.destroy',$tweet->id)}}" method="post">
                @csrf
                @method('delete')
                    <button type="submit"><i class="far fa-thumbs-down"></i></button>

                </form> 

            </div>   



    </div>

    </div>

        <form action="{{route('comment.store',$tweet->id)}}" method="post">
        @csrf
            <div class="collapse" id="view-comments-{{$tweet->id}}">
                <div class="input-group mb-3 col-12">
                    <input name="comment" type="text" class="form-control" placeholder="Tweet Comment">


                    <div class="input-group-append flex">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>


                </div>
                    

            </div>
        </form>


    <div>





</div>
@endforeach


@endsection
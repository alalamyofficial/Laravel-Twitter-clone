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
                    
                    <div class="flex"> 
                        <a href="{{route('profile',$tweet->user)}}" class="mr-5">
                            {{$tweet->user->username}}
                        </a>

                        <p class="text-sm mr-3">
                            {{ $tweet->created_at->diffForHumans() }}
                        </p>
                    
                    </div>
                </h5>

                    
                    <p class="text-sm mb-3">

                        {{$tweet->body}}


                    </p><br>
                    

            </div>

        </div>

        <br>
        <div class="mb-3">
            Reply to <a href="{{route('profile',$tweet->user)}}">{{$tweet->user->username}}</a>
        </div>
        
        @include('comments.create')
        @include('comments.show')

@endforeach

@endsection

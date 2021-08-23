@extends('layouts.app')

@section('content')

    <ul style="width:300px">

    @forelse( $tweet_likes as $like )
        <li class="{{ $loop->last ? '' : 'mb-4' }}">

            <div class="flex items-center text-sm">

                <a href="">

                    <img src="{{$like->user->avatar}}" alt="" class="rounded-full mr-2" style="width:50px; height:50px">
                </a>  

                <a href="{{route('profile',$like->user)}}">

                    {{$like->user->username}}

                </a>    

            </div>

            
        </li>

    @empty
        <li>Tweet Has No Likes</li>

    @endforelse

    </ul>


@endsection

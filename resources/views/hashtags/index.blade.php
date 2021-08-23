@extends('layouts.app')

@section('content')

    <h1>Tweeted content in 
    #{{ $hashtag->slug }} 


    </h1><br><hr><br>
    @foreach($hashtag->tweets as $tweet)
        
        @include('tweet')


    @endforeach

@endsection
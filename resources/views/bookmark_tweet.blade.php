@extends('layouts.app')

@section('content')


    @foreach ($tweets as $tweet)
        
           {{$tweet}} 

    @endforeach


@endsection
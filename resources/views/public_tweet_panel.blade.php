@extends('layouts.app')

@section('content')

    <tweet :user="{{ Auth::user()}}"></tweet>


@endsection    
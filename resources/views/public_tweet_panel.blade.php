@extends('layouts.app')

@section('content')


<div class="border-2 border-blue-500 rounded-lg px-8 py-6 mb-8">

    <textarea class="resize w-full" style="height:100px" placeholder="What's up doc ?"></textarea>

    <hr class="my-4">

    <footer class="flex justify-between items-center">

        <div class="flex items-center text-sm">

            <img src="" alt="your avatar" class="rounded-full mr-2"
            style="width:50px; height:50px"
            >

        </div>

        <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Tweet
        </button>

    </footer>

</div>

@endsection    
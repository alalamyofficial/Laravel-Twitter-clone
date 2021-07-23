@extends('layouts.app')

@section('content')


    <header class="mb-6 relative">


        <div class="relative">
        
            <img class="rounded-lg" 
            src="https://i.pinimg.com/originals/a1/4b/99/a14b99685158aa23e2117ed121a35dce.jpg" 
            alt="image">

            <img src="{{$user->avatar}}" alt="image" 
                class="rounded-full mr-2 absolute buttom-0"
                width="150"
                style="left: 50%; height:150px;
                       transform: translateX(-67px) translateY(-85px);"
            >        
        </div>




        <div class="flex justify-between items-center mb-6">

            <div style="max-width:300px">
                <h2 class="font-bold text-2xl mb-1 mt-2">{{$user->name}}</h2>
                <h2 class="text-sm mb-1 mt-1"><i class="fas fa-at"></i> {{$user->username}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>


            <div class="mt-2 flex">

                @can('edit',$user)

                    <form action="{{route('user.edit',$user->username)}}" method="get">

                        <button type="submit" 

                            class="rounded-full border 
                            border-gray-300 mr-2 px-3 
                            py-2 text-black text-xs">
                        
                        Edit Profile</button>
                    
                    </form>

                @endcan   

                @include('components.follow_button')


            </div>

        </div>

            <p class="text-sm">
            
            Hi, I'm Jeffrey. I'm the creator of Laracasts and spend most of my days building the site and thinking of new ways to teach confusing concepts. I live in Orlando, Florida with my wife and two kids.

            </p>
        
            <div class="flex mt-3 mb-3">
            
                <div class="flex">

                    <a href="{{route('user.followings',$user->id)}}" class="flex">
                        <span class="font-bold">{{$user->follows->count()}}</span>
                        <p class="ml-1">Following</p> 
                    </a>

                </div>

                <div class="flex ml-5">

                    <a href="{{route('user.followers',$user->id)}}" class="flex">
                        <span class="font-bold">{{$user->user_followers->count()}}</span>
                        <p class="ml-1">Followers</p> 
                    </a>

                </div>

            </div>

        


    </header>



    @include('timeline',[

            'tweets' => $tweets

        ]
    )



@endsection    




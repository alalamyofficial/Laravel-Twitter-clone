@extends('layouts.app')

@section('content')



    <header class="mb-6 relative">


        <div class="relative">
        
            <img class="rounded-lg" 
            src="{{$user->cover}}" 
            alt="image" style="height:240px; width:800px;">

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
                <h2 class="text-sm mb-1 mt-1"><i class="fas fa-at" style="color:gray"></i> {{$user->username}}</h2>
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

                {{$user->bio}}            

            </p>
        
            <div class="flex">

                @if(($user->country) != null)
                    <p class="text-sm"><i class="fas fa-map-marker-alt mr-2 " style="color:gray"></i>{{$user->country}}</p>
                @else
                
                @endif

                <p class="text-sm"><i class="fas fa-calendar-alt mr-2 ml-3" style="color:gray"></i> Joined {{$user->created_at->diffForHumans()}}</p>
            

            </div>



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




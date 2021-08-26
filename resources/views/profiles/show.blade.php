@extends('layouts.app')

@section('content')



    <header class="mb-6 relative">


        <div class="relative">
        
            <!-- cover -->
            <a data-toggle="modal" data-target=".bd-example-modal-lg">

                <img class="rounded-lg" 
                src="{{$user->cover}}" 
                alt="image" style="height:240px; width:800px;">
            </a>    


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <img src="{{$user->cover}}" alt="image" 
                            class="ml-3 mb-4 mt-4"
                            width="770"
                        >                       
                    </div>
                </div>
            </div>


            <!-- profile pic -->
            <a data-toggle="modal" data-target="#exampleModal2">
                <img src="{{$user->avatar}}" alt="image" 
                    class="rounded-full mr-2 absolute buttom-0"
                    width="150"
                    style="left: 50%; height:150px;
                           transform: translateX(-67px) translateY(-85px);"
                >        
            </a>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Pic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{$user->avatar}}" alt="image" 
                        class=""
                        width="460"
                    >                  
                </div>
 
                </div>
            </div>
        </div>


        <div class="flex justify-between items-center mb-6">

            <div style="max-width:300px">
                <div class="flex">
                    <h2 class="font-bold text-2xl mb-1 mt-2">{{$user->name}}</h2> 
                    @if($user->verified == 1)
                    <i class="bi bi-patch-check-fill mt-3 ml-2" style="color:#3f6ef3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    </i>
                    @else
                    @endif 
                </div>
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

        


    </header><br>



    <div class="flex justify-content-between mr-7 ml-7 text-lg text-bold-400 pb-3">
    
        <a href="{{route('profile',auth()->user())}}">Tweets</a>
        <a href="{{route('profile',auth()->user())}}">Tweets & Replies</a>
        <a href="{{route('retweet_tweets',$user)}}">Retweets</a>
        <a href="{{route('media_tweets',$user)}}">Media</a>
        <a href="{{route('like_tweets',$user)}}">Likes</a>

    </div>

    @yield('profile')

    @include('timeline',[

        'tweets' => $tweets

        ]
    )


@endsection    




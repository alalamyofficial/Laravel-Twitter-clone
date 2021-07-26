

<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400' }} ">

     
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
                <!-- if getRouteKey not found will e ==>  $tweet->user->name , this is called forign key-->
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


            <div class="flex justify-between">
            
                <div class="flex">
                    <button><i class="far fa-comment"></i></i></button> 
                    <p class="">10</p>
                </div>
                <div class="flex">
                    <button><i class="fas fa-retweet"></i></button>
                    <p>10</p>
                </div>
                <div class="flex justify-between">
                    <button><i class="far fa-heart"></i></button>
                    <p>10</p>
                </div>    

            </div>   




    </div>

</div>
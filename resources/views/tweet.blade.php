

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

            
            <img class="pb-3" src="{{asset($tweet->image)}}" alt="" style="width:400px">


            <div class="flex justify-between">
            
                <!-- <a href="{{route('single_tweet',$tweet->id)}}">
                    <div class="flex">
                        <button><i class="far fa-comment"></i></i></button> 
                        <p class="">10</p>
                    </div>
                </a> -->
                <div class="flex">
                    <button class="" type="submit" data-toggle="collapse" data-target="#view-comments-{{$tweet->id}}" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-comment"></i></i>                
                    </button> 
                    <p>{{count($tweet->comments)}}</p>
                                
                </div>

                <div class="flex">
                    <button><i class="fas fa-retweet"></i></button>
                    <p>10</p>
                </div>

                <div class="flex justify-between">
                    <a href="#" class="like"><i class="far fa-thumbs-up"></i></a>
                    <p>10</p>
                </div>

                <div class="flex">

                    <a href="#" class="like"><i class="far fa-thumbs-down"></i></a>
                    <p>10</p>

                </div>

                <!-- <a href="tweet/like" class="like">Like</a>
                <a href="#" class="like">Dislike</a> -->


            </div>   



    </div>

    </div>

        <form action="{{route('comment.store',$tweet->id)}}" method="post">
        @csrf
            <div class="collapse" id="view-comments-{{$tweet->id}}">
                <div class="input-group mb-3 col-12">
                    <input name="comment" type="text" class="form-control" placeholder="Tweet Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append flex">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>


                </div>
                    
                @include('comments.show')

            </div>
        </form>


    <div>





</div>

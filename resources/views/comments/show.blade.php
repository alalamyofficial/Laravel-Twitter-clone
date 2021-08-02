<!-- <getcommemt :userid="{{Auth::user()->id}}" :tweetid="{{$tweet->id}}"></getcommemt> -->
<div class="tweets">
                    
    @foreach($tweet->comments as $comment)

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> 
                        <a href="{{$comment->user->username}}">
                            <img src="{{$comment->user->avatar}}" width="30" class="user-img rounded-circle mr-2"> 
                        </a>
                        <span><a href="/profile/{{$comment->user->username}}" class="font-weight-bold text-primary">{{$comment->user->name}}</a> 
                        </div> <small>{{$comment->created_at->diffForHumans()}}</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        
                        <small class="font-weight-bold">{{$comment->comment}}</small></span> 

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
    <hr>

</div>
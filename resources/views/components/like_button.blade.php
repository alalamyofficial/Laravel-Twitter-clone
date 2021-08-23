@auth
    @if (!$tweet->likedBy(auth()->user()))
        <form action="{{ route('tweet.like', $tweet) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">
                <i class="far fa-heart"></i>
            </button>
                <a href="{{route('tweet.likes',$tweet->id)}}">
                    {{ $tweet->likes->count() }}
                </a> 
            
        </form>
    @else
        <form action="{{ route('tweet.like', $tweet) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">
                <i class="far fa-heart fill-current text-red-600"></i>
            </button>
                <a href="{{route('tweet.likes',$tweet->id)}}">                                
                    {{ $tweet->likes->count() }}

                </a> 
        </form>
    @endif
@endauth
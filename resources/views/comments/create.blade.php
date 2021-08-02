
<!-- <addcommemt :userid="{{Auth::user()->id}}" :tweetid="{{$tweet->id}}"></addcommemt> -->

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('comment.store')}}" method="post">
@csrf
    <div class="flex">
        <textarea
            name="comment"
            class="form-control mb-1"
            rows="2"
            placeholder="Write a comment here..."
            id="example1"
            data-emoji-input="unicode"
            data-emojiable="true"
        ></textarea>
        <button class="btn btn-light">Comment</button>
    </div>

</form>
 -->

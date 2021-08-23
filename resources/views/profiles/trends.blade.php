<h2>Trends</h2><br>

<div>


    @foreach($hashtags as $hashtag)

       <h4>
        <a href="{{route('hashtag',$hashtag->slug)}}">#{{$hashtag->slug}}</a> <br>
       </h4> 
       <p>{{$hashtag->tweets()->count()}} Tweets</p><hr><br>


    @endforeach

</div>
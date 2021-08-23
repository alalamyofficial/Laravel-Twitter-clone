<<<<<<< HEAD
<h2>Trends</h2><br>

<div>


    @foreach($hashtags as $hashtag)

       <h4>
        <a href="{{route('hashtag',$hashtag->slug)}}">#{{$hashtag->slug}}</a> <br>
       </h4> 
       <p>{{$hashtag->tweets()->count()}} Tweets</p><hr><br>
=======
<h2>Trends</h2>

<div>

    @foreach($hashtags as $hashtag)
    <ul>
    
        <li>
            {{$hashtag->body}} <br><br>
        </li>

    </ul>
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d


    @endforeach

</div>
<h2>Trends</h2>

<div>

    @foreach($hashtags as $hashtag)
    <ul>
    
        <li>
            {{$hashtag->body}} <br><br>
        </li>

    </ul>


    @endforeach

</div>
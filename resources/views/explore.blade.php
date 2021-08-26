@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <?php



        $queryString = http_build_query([
            'access_key' => '70967196e61a47461b0aa073cad2c2f7',
            'keywords' => 'Wall street -wolf', // the word "wolf" will be
            'categories' => '-entertainment',
            'sort' => 'popularity',
        ]);
        
        $ch = curl_init( 'https://newsapi.org/v2/everything?q=keyword&apiKey=d22851c367cc4f20b17c2c824c6c82e9');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $json = curl_exec($ch);
        
        curl_close($ch);
        
        $apiResult = json_decode($json, true);
        

        foreach($apiResult['articles'] as $data){
            
            echo "<div class='card' style='width: 70rem;'>";
                echo "<img src='$data[urlToImage]' class='card-img-top' >"."<br>";
                echo "<div class='card-body'>";
                    echo "<h4 class='card-title'>$data[title]</h4>"."<br>";
                    echo "<br>";
                    echo $data['author']."<br>";
                    echo "<br>";
                    echo $data['description']."<br>";
                    echo "<br>";
                    echo "<a href='$data[url]'>$data[url]</a>"."<br>";
                echo "</div>";    
                echo "<br>";

                    
            echo "</div>";    
                
            echo "<br>";

            echo "<hr>";
        }



        ?>


    </div>
</div>

    <hr>    


<div>
    <h3>Who to follow</h3><br>   
    @foreach ($users as $user)
        <a href="{{route('profile',$user)}}" class="flex items-center mb-5">
            <img src="{{ $user->avatar }}"
                    alt="{{ $user->name }}'s avatar"
                    width="60"
                    class="mr-4 rounded"
            >

            <div>
                <h4 class="font-bold">{{$user->name}}</h4>
            </div>
        </a>
    @endforeach

</div>

@endsection
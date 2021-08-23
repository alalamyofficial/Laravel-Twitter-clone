
<div class="mr-3 bg-white p-3">
    <h3>What’s happening</h3>
    <br>

    <div class="container">

    <div class="row">

        <?php



        $queryString = http_build_query([
            'access_key' => '70967196e61a47461b0aa073cad2c2f7',
            'keywords' => 'Wall street -wolf', // the word "wolf" will be
            'categories' => '-sport',
            'sort' => 'popularity',
            "totalResults" => 2,

        ]);
        
        $url = 'https://newsapi.org/v2/everything?q=trends&pageSize=2&apiKey=d22851c367cc4f20b17c2c824c6c82e9';

        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $json = curl_exec($ch);
        
        curl_close($ch);
        
        $apiResult = json_decode($json, true);
        
        //   print_r($apiResult);

        foreach($apiResult['articles'] as $data){
            
            echo "<div class='d-flex'>";
                echo "<div class='column mr-2'>";
                    echo "<h6 class='card-title'>$data[title]</h6>";
                    echo "<a target='_blank' href='$data[url]'>View</a>";
                echo "</div>";    
                echo "<img src='$data[urlToImage]' class='card-img-top mr-2' 
                style='width:100px; height:60px;' >"."<br>";
            echo "</div>"; 
            echo "<br>";   

        }



        ?>


    </div>

    </div>
</div>
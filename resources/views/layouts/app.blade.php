<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512-Nqct4Jg8iYwFRs/C34hjAF5og5HONE2mrrUV1JZUswB+YU7vYSPyIjGMq+EAQYDmOsMuO9VIhKpRUa7GjRKVlg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" integrity="sha512-jQqzj2vHVxA/yCojT8pVZjKGOe9UmoYvnOuM/2sQ110vxiajBU+4WkyRs1ODMmd4AfntwUEV4J+VfM6DkfjLRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/regular.min.js" integrity="sha512-jR9mIF29jOBsgismrZaiPV9H/VNWOpnILyA4MPEPgJFadfbWT0mQ5MnxCMd+JCYdoTuB2n1SkI00XkELU4ETmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="js/fgEmojiPicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
    
    /* li a .active {
        background-color: yellow;
    } */

    /* .currentLink {
        color: #640200;
        background-color: #000000;
    } */

    /* a:active,
        a:focus {
            text-decoration: none;
            color: #009ce7;
            outline: none;
    } */


    /* .links:active {
        background-color: red;
        color: white;
    } */

    
    </style>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <section>
        <section class="px-4 mb-4">
            
            <header class="container mx-auto mt-6">

                <h1>
                    <img src="{{asset('tweet.png')}}" alt="" width="60px"> 
                </h1>

            </header>

        </section>

        <section class="px-8 py-4">
            <main class="container mx-auto">
                <div class="flex lg:justify-between">
                
                    @if(auth()->check())

                        <div class="lg:w-32">


                            @include('sidebar_links')
                        
                            
                        
                        </div>

                    @endif


                    <div class="lg:flex-1 lg:mx-10" style="max-width:700px">


                        @yield('content')            
                        
                    </div>

                    @if(auth()->check())
                        <div class="lg:w-1/6 bg-white-100 rounded-lg p-4" style="max-width:1000px">



                            @include('friends_list')


                        </div>
                    @endif    

                </div>
            </main>
        </section>
    </section>


    </div>

    <script src="http://unpkg.com/turbolinks"></script>

     <script src="{{asset('js/like.js')}}"></script>   
     <script src="{{asset('js/upload.js')}}"></script>   
     <script src="{{asset('js/fgEmojiPicker.js')}}"></script>   
     <script src="{{asset('js/emojionearea.min.js')}}"></script>   
     <script src="{{asset('js/emojionearea.js')}}"></script>
     <script src="{{asset('js/emoji_icon.js')}}"></script>   

<<<<<<< HEAD
     <script>
        var token = '{{ Session::token() }}';
     </script>

        <!-- <script>
            $(document).ready(function() {
                $(".links").click(function () {
                    if(!$(this).hasClass('active'))
                    {
                        $(".links.active").removeClass("active");
                        $(this).addClass("active");        
                    }
                });
            });
        </script> -->
=======
    <script>
    
    window.onload = function em(){ 

    
        new FgEmojiPicker({
            
            trigger: ["#btn"],
            position: ["bottom", "right"],
            dir: "js/",
            emit(obj, triggerElement) {
                    const emoji = obj.emoji;
                    document.querySelector("#example1").value += emoji;
            }
            
        });

    };


>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d


     <script>
     
        function em1(){ 

        new FgEmojiPicker({
                
                trigger: ["#btn1"],
                position: ["bottom", "right"],
                dir: "js/",
                emit(obj, triggerElement) {
                        const emoji = obj.emoji;
                        document.querySelector("#example2").value += emoji;
                }
                
            });
        };    
     
     </script>   




    @include('sweetalert::alert')

</body>
</html>

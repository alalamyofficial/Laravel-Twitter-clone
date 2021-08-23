<div class="flex flex-col" style="    
    max-width: 1000px;
<<<<<<< HEAD
    width: 315px;
    margin-top: -23px;
    ">
=======
    width: 315px;">
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d

    <div class="mr-3 mb-4">
        @include('components.search')
    </div><br>

<<<<<<< HEAD
=======
    <div class="mr-3">
    </div>
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d

    <!-- is route -->

    @include('is_route')

<<<<<<< HEAD
=======
    <h3 class="font-bold text-xl mb-4">You might like</h3>
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d

    <br><br>

     <div class="bg-white p-3">
     
        <h3 class="font-bold text-xl mb-4">You might like</h3>
        
        <ul style="width:300px">

            @forelse( auth()->user()->follows as $user )
            <li class="{{ $loop->last ? '' : 'mb-4' }}">

                <div class="flex items-center text-sm">

                    <a href="">

                        <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2" style="width:50px; height:50px">
                    </a>  

                    <a href="{{route('profile',$user)}}">

                        {{$user->name}}

                    </a>    

                </div>

                
            </li>

            @empty
                <li>No Friends Yet</li>

            @endforelse

        </ul>
        <br><br><hr><br>

    <div class="mr-3">

        @include('profiles.trends')

    </div>

     </div>
               
    <br><br>

    <div class="bg-white p-3 mr-3">

        @include('profiles.trends')

    </div>


</div>

<div class="flex flex-col" style="    
    max-width: 1000px;
    width: 315px;
    margin-top: -23px;
    ">

    <div class="mr-3 mb-4">
        @include('components.search')
    </div><br>


    <!-- is route -->

    @include('is_route')


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

     </div>
               
    <br><br>

    <div class="bg-white p-3 mr-3">

        @include('profiles.trends')

    </div>


</div>

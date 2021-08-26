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

                        <div class="flex">
                            {{$user->name}}  

                            @if($user->verified == 1)
                            <i class="bi bi-patch-check-fill ml-2" style="color:#3f6ef3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg>
                            </i>
                            @else
                            @endif 
                        </div>

                    </a>    

                </div>

                
            </li>

            @empty
                <li>No Friends Yet</li>

            @endforelse

        </ul>
        <br><br><hr><br>


     </div>
               
    <br><br>

    <div class="bg-white p-3 mr-3">

        @include('profiles.trends')

    </div>


</div>

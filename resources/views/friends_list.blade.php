<div class="flex flex-col">


    <h3 class="font-bold text-xl mb-4">Following</h3>


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

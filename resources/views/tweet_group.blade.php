
<div class="flex">

    <div id="content" >
        <div class="grid grid-cols-3">
            @forelse($tweets as $tweet)

                @if($tweet->image != Null)    

                        <img src="{{asset($tweet->image)}}" alt="" 
                        class="img-fluid img-center img-thumbnail object-fill"
                        style="height: 95px;"
                        > 

                @endif
                
            @empty
                <p class="p-4">No Media Yet</p>

            @endforelse  
        </div>
    </div>
</div>



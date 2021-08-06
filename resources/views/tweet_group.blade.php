
<div class="flex">

<div id="content" style="

        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-column-gap: 25px;
        grid-row-gap: 25px;
        width:100%;

        ">
  <div class="wrapper" style="  max-width:100%;">
        @forelse($tweets as $tweet)

            @if($tweet->image != Null)    

                    <img src="{{asset($tweet->image)}}" alt="" 
                    class="img-fluid img-thumbnail"
                    > 

            @endif
            
        @empty
            <p class="p-4">No Media Yet</p>

        @endforelse  
    </div>
</div>
</div>



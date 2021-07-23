<div class="border border-gray-300 rounded-lg">

    @forelse($tweets as $tweet)

            
            @include('tweet')
        


    @empty
        <p class="p-4">No Tweets Yet</p>

    @endforelse    

    <div style="right: 690px;
    position: absolute;
    padding-top: 30px; padding-buttom:10px" >
    
        {{ $tweets->links() }}

    </div>


</div>

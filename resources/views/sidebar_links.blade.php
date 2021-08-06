<ul>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('home')}}"><i class="fas fa-home mr-3"></i> Home</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('explore.show')}}"><i class="fas fa-hashtag mr-3"></i> Explore</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
        <div class="flex">
            <notifications></notifications>
            <p style="  top: 10px;
                        position: relative;
                        right: 12px;
                    ">
                Notifications
            </p>
        </div>
        </a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="/chatify"><i class="fas fa-envelope mr-3"></i> Messages</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('tweet.showBookmark')}}"><i class="fas fa-bookmark mr-3"></i> Bookmarks</a>
    </li>


    <li>
        <a class="font-bold text-lg mb-4 block" href="#"><i class="fas fa-clipboard-list mr-3"></i> Lists</a>
    </li>

    @auth

        <li>
            <a class="font-bold text-lg mb-4 block" href="{{route('profile',auth()->user())}}">
            <i class="fas fa-user mr-3"></i>
            Profile</a>
        </li>

        <li>
            <form method="POST" action="/logout">
                    @csrf

                    <button class="font-bold text-lg" style="color:#5b8aca">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout</button>
            </form>    
        </li><br>

        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="
        
        color: white;
        background-color: #40caf3;
        width: 122px;
        border-radius: 40px;
        font-size: 18px;

        ">Tweet</button>

    @endauth


</ul>


<!-- modal for tweet -->

    <div class="modal fade" id="exampleModal" 
        
        
        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 1104px; left: -281px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Write your Tweet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                
                @include('public_tweet_panel')

            </div>
    </div>
  </div>
</div>
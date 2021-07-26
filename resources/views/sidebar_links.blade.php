<ul>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('home')}}"><i class="fas fa-home mr-3"></i> Home</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('explore.show')}}"><i class="fas fa-hashtag mr-3"></i> Explore</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="#"><i class="fas fa-bell mr-2"></i> Notification</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="#"><i class="fas fa-envelope mr-3"></i> Messages</a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="#"><i class="fas fa-bookmark mr-3"></i> Bookmarks</a>
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
        </li>

    @endauth


</ul>
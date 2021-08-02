
    <form action="/{{$user}}/like" method="post">
        @csrf
            <button type="submit"
                                
                class="bg-blue-500 rounded-lg shadow 
                px-4 py-2 text-white text-xs"

            >
            {{auth()->user()->liking($user) ? 'UnLike' : 'Like'}}
            
            </button>

    </form>


@unless(current_user()->is($user))

    <form action="/profiles/{{$user->username}}/follow" method="post">
        @csrf
            <button type="submit"
                                
                class="bg-blue-500 rounded-lg shadow 
                px-4 py-2 text-white text-xs"

            >
            {{auth()->user()->following($user) ? 'Unfollow' : 'Follow'}}
            
            </button>

    </form>

@endunless  
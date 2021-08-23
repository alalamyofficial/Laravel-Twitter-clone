@if(Route::is('home') )
    @include('news')   
@endif

@if(Route::is('explore.show') )
    @include('news')   
@endif

@if(Route::is('tweet.showBookmark'))
    @include('news')   
@endif

@if(Route::is('list'))
    @include('news')   
@endif

@if(Route::is('single_tweet'))
    @include('news')   
@endif


@if(Route::is('profile',auth()->user()) )
    @include('grid_photos')   
@endif
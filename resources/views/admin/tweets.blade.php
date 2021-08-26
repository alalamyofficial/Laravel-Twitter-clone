@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
    @if(count($tweets) > 0)
        <div class="card-header">
            <h3>Tweets Datatable <span class="badge bg-light-primary">Count : {{$tweet_count}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 15.0673%;">
                            <a href="#" class="dataTable-sorter">ID</a>
                        </th>
                        <th data-sortable="" style="width: 15.0673%;">
                            <a href="#" class="dataTable-sorter">Tweet Author</a>
                        </th>
                        <th data-sortable="" style="width: 20.2572%;">
                            <a href="#" class="dataTable-sorter">Body</a>
                        </th>
                        <th data-sortable="" style="width: 17.09%;">
                            <a href="#" class="dataTable-sorter">Image</a>
                        </th>
                        <th data-sortable="" style="width: 17.09%;">
                            <a href="#" class="dataTable-sorter">Owner Tweet ID</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Original Tweet ID</a>
                        </th>
                        <th data-sortable="" style="width: 15.0129%;">
                            <a href="#" class="dataTable-sorter">Retweet</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Published</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tweets as $tweet)
                    <tr>
                        <td>{{$tweet->id}}</td>
                        <td>{{$tweet->user->username}}</td>
                        <td>{{$tweet->body}}</td>       

                        <td>
                            @if($tweet->image != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($tweet->image)}}" class="img-responsive" alt="">
                                </div>
                            @else
                                <p>Has No Image</p>    

                            @endif
                        
                        </td>    

                        <td>
                            @if($tweet->owner_tweet_id != Null)

                                {{$tweet->owner_tweet_id}}
                            @else
                                NULL
                            @endif        
                        </td>
                        <td>
                            @if($tweet->original_tweet != Null)

                                {{$tweet->original_tweet}}
                            @else
                                NULL
                            @endif        
                        </td>

                        <td>
                            @if($tweet->retweet == 1)

                                <b>Yes</b>
                            @else
                                <b>No</b>
                            @endif        
                        </td>

                        <td>{{$tweet->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.tweets.destroy',$tweet->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-times-circle"></i>
                                </buttons>
                            </form>
                        </td>
                            
                    </tr>
                    @endforeach
                </tbody>
        </div>
    @else
        <p class="row">No Tweets Found</p>
    @endif    

    </div>
</section>

    {{$tweets->links()}}

@endsection
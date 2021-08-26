@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        @if(count($hashtags) > 0)
        <div class="card-header">
            <h3>Hashtags Datatable <span class="badge bg-light-primary">Count : {{$hashtag_count}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Name</a>
                        </th>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Tweets List</a>
                        </th>
                        <th data-sortable="" style="width: 33.0129%;">
                            <a href="#" class="dataTable-sorter">Created At</a>
                        </th>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hashtags as $hashtag)
                    <tr>
                        <td>{{$hashtag->slug}}</td>  

                        <td>
                        
                            @foreach($hashtag->tweets as $tweet)
                                <b>{{$tweet->body}}</b>
                                @if($tweet->image != Null)
                                    <div class="avatar avatar-xl me-3">
                                        <img src="{{asset($tweet->image)}}" alt="">
                                    </div>
                                @endif
                                <br><hr><br>    
                            @endforeach

                        </td>

                        <td>{{$hashtag->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.hashtag.destroy',$hashtag->id)}}" method="post">
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
            <p class="row"><center>No Hashtags Found</center></p>
        @endif
    </div>
</section>

    {{$hashtags->links()}}

@endsection
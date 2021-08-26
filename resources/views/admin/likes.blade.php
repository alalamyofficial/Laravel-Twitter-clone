@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        @if(count($likes) > 0)
        <div class="card-header">
            <h3>Tweets Likes Datatable  <span class="badge bg-light-primary">Count : {{$like_count}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">User That Like</a>
                        </th>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Tweet That Liked</a>
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
                    @foreach($likes as $like)
                    <tr>
                        <td>{{$like->user->username}}</td>       
                        <td>
                            {{$like->tweet->body}}
                        
                            @if($like->tweet->image != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($like->tweet->image)}}" class="img-responsive" alt="">
                                </div>
                            @endif

                        </td>       
                        <td>{{$like->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.like.destroy',$like->id)}}" method="post">
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
        <p class="row"><center>No Likes Found</center></p>
        @endif
    </div>
</section>

    {{$likes->links()}}

@endsection
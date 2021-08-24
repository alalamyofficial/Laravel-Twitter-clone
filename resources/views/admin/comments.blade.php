@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Comments Datatable <span class="badge bg-light-primary">Count : {{count($comments)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 29.0129%;">
                            <a href="#" class="dataTable-sorter">User That Comment</a>
                        </th>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">Tweet</a>
                        </th>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">Comment</a>
                        </th>
                        <th data-sortable="" style="width: 20.0129%;">
                            <a href="#" class="dataTable-sorter">Created At</a>
                        </th>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->user->username}}</td>       
                        <td>
                            
                            {{$comment->tweet->body}}

                            @if($comment->tweet->image != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($comment->tweet->image)}}" class="img-responsive" alt="">
                                </div>
                            @endif
                        
                        </td>       
                        <td>{{$comment->comment}}</td>       
                        <td>{{$comment->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
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
    </div>
</section>

    {{$comments->links()}}

@endsection
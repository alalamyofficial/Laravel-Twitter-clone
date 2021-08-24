@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Bookmarks Datatable <span class="badge bg-light-primary">Count : {{count($bookmarks)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 35.0673%;">
                            <a href="#" class="dataTable-sorter">Tweet ID</a>
                        </th>
                        </th>
                        <th data-sortable="" style="width: 33.0129%;">
                            <a href="#" class="dataTable-sorter">User ID</a>
                        </th>
                        <th data-sortable="" style="width: 30.0129%;">
                            <a href="#" class="dataTable-sorter">Created At</a>
                        </th>
                        <th data-sortable="" style="width: 30.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookmarks as $bookmark)
                    <tr>
                        <td>{{$bookmark->tweet_id}}</td>
                        <td>{{$bookmark->user_id}}</td>       
                        <td>{{$bookmark->created_at}}</td>

                        <td>
                            <form action="{{route('admin.bookmark.destroy',$bookmark->id)}}" method="post">
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

    {{$bookmarks->links()}}

@endsection
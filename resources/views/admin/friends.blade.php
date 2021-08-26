@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
    @if(count($friends)>0)
        <div class="card-header">
            <h3>(Followers & Followings) Datatable 
            <span class="badge bg-light-primary">Count : {{$friend_count}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 30.0129%;">
                            <a href="#" class="dataTable-sorter">Followers ID</a>
                        </th>
                        <th data-sortable="" style="width: 28.0129%;">
                            <a href="#" class="dataTable-sorter">Follow</a>
                        </th>
                        <th data-sortable="" style="width: 32.0129%;">
                            <a href="#" class="dataTable-sorter">Followings ID</a>
                        </th>
 
                    </tr>
                </thead>
                <tbody>
                    @foreach($friends as $friend)
                    <tr>
                        <td>{{$friend->user_id}}</td>
                        <td>Follow</td>  
                        <td>{{$friend->following_user_id}}</td>  

                            
                    </tr>
                    @endforeach
                </tbody>
        </div>
    @else
        <p class="row"><center>No Friends Found</center></p> 
    @endif       
    </div>
</section>


@endsection
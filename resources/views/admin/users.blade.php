@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Users Datatable <span class="badge bg-light-primary">Count : {{count($users)}}</span></h3>
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
                            <a href="#" class="dataTable-sorter">Name</a>
                        </th>
                        <th data-sortable="" style="width: 20.2572%;">
                            <a href="#" class="dataTable-sorter">Username</a>
                        </th>
                        <th data-sortable="" style="width: 17.09%;">
                            <a href="#" class="dataTable-sorter">Avatar</a>
                        </th>
                        <th data-sortable="" style="width: 17.09%;">
                            <a href="#" class="dataTable-sorter">Cover</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Bio</a>
                        </th>
                        <th data-sortable="" style="width: 15.0129%;">
                            <a href="#" class="dataTable-sorter">Country</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Email</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Join</a>
                        </th>
                        <th data-sortable="" style="width: 17.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>       

                        <td>
                            @if($user->avatar != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($user->avatar)}}" class="img-responsive" alt="">
                                </div>
                            @else
                                <p>Has No Avatar</p>    

                            @endif
                        
                        </td> 

                        <td>
                            @if($user->cover != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($user->cover)}}" class="img-responsive" alt="">
                                </div>
                            @else
                                <p>Has No Cover</p>    

                            @endif
                        
                        </td>  

                        <td>{{$user->bio}}</td>       
                        <td>{{$user->country}}</td>       
                        <td>{{$user->email}}</td>       


                        <td>{{$user->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
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

    {{$users->links()}}

@endsection
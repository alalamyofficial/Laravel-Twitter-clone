@extends('admin.layout.admin_layout')

@section('body')

<h2>Edit User <i class="fa fa-at fa-1x"></i>{{$user->username}}</h2><hr><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('admin.user.update',$user->id)}}" method="post">
    @csrf
    @method('patch')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div><br>

        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" value="{{$user->username}}" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div><br>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div><br>

        <div class="form-group">
            <label for="exampleFormControlFile1">Avatar</label>
            <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
            <img src="{{$user->avatar}}" alt="" style="width:40px">
        </div><br>

        <div class="form-group">
            <select class="form-control" name="role">
                <option>Role</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
        </div><br>

        <div class="form-group">
            <select class="form-control" name="verified">
                <option>Verifiy</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div><br>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
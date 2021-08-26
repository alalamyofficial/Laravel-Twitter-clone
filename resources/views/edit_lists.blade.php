@extends('layouts.app')

@section('content')


<form action="{{route('list.update',$task->id)}}" method="post">

  @csrf
  @method('patch')  

  <div class="form-group">
    <input type="text" value="{{$task->task}}" class="form-control" name="task" placeholder="Enter Task">
    <br><button type="submit" class="btn btn-success">Update</button>

  </div>

</form><br>  




@endsection


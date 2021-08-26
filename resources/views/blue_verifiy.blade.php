@extends('layouts.app')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('verifiy.store')}}" method="post">
  @csrf

  <div class="mb-3">

    <div class="form-floating">
        <h2 for="order_message">Send Verifiy Request If Your Account is Popular </h2><br>
        <textarea class="form-control" name="order_message" placeholder="Send Request"></textarea>
    </div>

  </div>
  
  <button type="submit" class="btn btn-primary">Send <i class="fa fa-paper-plane"></i></button>
</form>

<hr><br>

    <h3>Mails</h3><br><br>
        <ul class="list-group">
        @foreach($orders as $order)

            <div>
                <li class="list-group-item">{{$order->order_message}} <br>
                <span class="badge badge-primary">{{$order->created_at->diffForHumans()}}</span>
                </li>
               
            </div><br>
        @endforeach  
        </ul>



@endsection
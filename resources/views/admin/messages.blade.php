@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Messages Datatable <span class="badge bg-light-primary">Count : {{($message_count)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">ID</a>
                        </th>
                        <th data-sortable="" style="width: 14.0129%;">
                            <a href="#" class="dataTable-sorter">Type</a>
                        </th>
                        <th data-sortable="" style="width: 15.0129%;">
                            <a href="#" class="dataTable-sorter">From</a>
                        </th>
                        <th data-sortable="" style="width: 15.0129%;">
                            <a href="#" class="dataTable-sorter">To</a>
                        </th>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">Body</a>
                        </th>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">Attachment</a>
                        </th>
                        <th data-sortable="" style="width: 19.0129%;">
                            <a href="#" class="dataTable-sorter">Seen</a>
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
                    @foreach($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>  
                        <td>{{$message->type}}</td>  
                        <td>{{$message->from_id}}</td>  
                        <td>{{$message->to_id}}</td>  
                        <td>{{$message->body}}</td>  
                        <td>
                            @if($message->attachment != Null)
                                <div class="avatar avatar-xl me-3">
                                    <img src="{{asset($message->attachment)}}" class="img-responsive" alt="">
                                </div>
                            @else
                                <p>Has No Attachment</p>    

                            @endif
                        
                        </td>                           
                        <td>
                            @if($message->seen == 1)

                                <b>Yes</b>
                            @else
                                <b>No</b>
                            @endif        
                        </td>

                        <td>{{$message->created_at}}</td>

                        <td>
                            <form action="{{route('admin.message.destroy',$message->id)}}" method="post">
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

    {{$messages->links()}}

@endsection
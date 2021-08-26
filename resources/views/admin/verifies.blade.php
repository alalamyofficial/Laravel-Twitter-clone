@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Verifies Datatable 
            <span class="badge bg-light-primary">Count : {{count($verifies)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 36.0129%;">
                            <a href="#" class="dataTable-sorter">User</a>
                        </th>
                        <th data-sortable="" style="width: 38.0129%;">
                            <a href="#" class="dataTable-sorter">Message</a>
                        </th>
  
                        <th data-sortable="" style="width: 22.0129%;">
                            <a href="#" class="dataTable-sorter">Action</a>
                        </th>
 
                    </tr>
                </thead>
                <tbody>
                    @foreach($verifies as $verifiy)
                    <tr>
                        <td>{{$verifiy->user->username}}</td>
                        <td>{{$verifiy->order_message}}</td>  

                        <td>
                            <form action="{{route('admin.verifiy.destroy',$verifiy->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-times-circle "></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                            
                    </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</section>


@endsection
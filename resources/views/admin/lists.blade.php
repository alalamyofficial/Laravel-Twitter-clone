@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Tasks Datatable <span class="badge bg-light-primary">Count : {{count($lists)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 39.0129%;">
                            <a href="#" class="dataTable-sorter">Task</a>
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
                    @foreach($lists as $list)
                    <tr>
                        <td>{{$list->task}}</td>       
                        <td>{{$list->created_at->diffForHumans()}}</td>

                        <td>
                            <form action="{{route('admin.list.destroy',$list->id)}}" method="post">
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

    {{$lists->links()}}

@endsection
@extends('admin.layout.admin_layout')

@section('body')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Users Visits Datatable 
                <span class="badge bg-light-primary">Count : {{($view_count)}}</span></h3>
        </div>
        <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">

                <table class="table table-striped dataTable-table" id="table1">
                <thead>
                    <tr>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Url</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Referer</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Languages</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Platform</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Device</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Browser</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">IP</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Visitor Type</a>
                        </th>
                        <th data-sortable="" style="width: 10.0129%;">
                            <a href="#" class="dataTable-sorter">Visitor ID</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visits as $visit)
                    <tr>
                        <td><small>{{substr($visit->url,21)}}</small></td>       
                        <td><small>{{substr($visit->referer,21)}}</small></td>       
                        <td><small>{{$visit->languages}}</small></td>       
                        <td><small>{{$visit->platform}}</small></td>       
                        <td><small>{{$visit->device}}</small></td>       
                        <td><small>{{$visit->browser}}</small></td>       
                        <td><small>{{$visit->ip}}</small></td>       
                        <td><small>{{$visit->visitor_type}}</small></td>       
                        <td><small>{{$visit->visitor_id}}</small></td>       
                            
                    </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</section>

    {{$visits->links()}}

@endsection
@extends('admin.layout.admin_layout')

@section('body')


<div class="page-heading">
    <h3>Website Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Site Views</h6>
                                    <h6 class="font-extrabold mb-0">{{$view_count}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">{{$followers_count}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">{{$followings_count}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold"><small>Saved Tweets</small></h6>
                                    <h6 class="font-extrabold mb-0">{{count($bookmark_tweets)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Messages</h4>
                        </div>

                        <div class="mycontainer">
                        <ul>
                            @if(count($latest_messages) > 0)
                                @foreach($latest_messages as $msg)
                            
                                    <li><span class="badge bg-light-secondary">
                                    {{$msg->body}}</span></li>

                                @endforeach
                            @else
                                <p scope="row" class="text-center"><b>No Messages Found</b></p>
                            @endif
                        </ul>

                                


                        </div>

                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                @if(count($comments) > 0)
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($comments as $comment)
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="{{asset($comment->user->avatar)}}">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">{{$comment->user->username}}</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">{{$comment->comment}}</p>
                                            </td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                    @else

                                    <p scope="row" class="text-center"><b>No Comments Found</b></p>

                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{Auth::user()->avatar}}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><small>{{Auth::user()->name}}</small></h5>
                            <h6 class="text-muted mb-0">
                                <small>
                                    <span class="badge bg-light-success">
                                        <i class="fa fa-at">
                                            {{Auth::user()->username}}
                                        </i>
                                    </span>
                                </small>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Users</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach($users as $user)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{asset($user->avatar)}}">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1"><small>{{$user->name}}</small></h5>
                            <h6 class="text-muted mb-0">
                                <i class="fa fa-at"></i><small>{{$user->username}}</small>
                            </h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
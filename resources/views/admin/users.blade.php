@extends('admin.layout.shell')
@section('content')
    <aside class="right-side">

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>Users</strong>
                            @if(session()->has('message'))
                                <strong><p>{{session('message')}}</p></strong>
                            @endif
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Type of User</th>
                                    <th>Membership Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_status}}</td>
                                        <!-- <td>Steve</td> -->
                                        @if($user->is_active)
                                            <td style="color: green">Active</td>
                                        @else
                                            <td style="color: red"><strong>Suspended</strong></td>
                                        @endif


                                        <td>
                                            <form action="/admin-section/users/{{$user->id}}/suspend" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                @if($user->is_active)
                                                    <button class="btn btn-default btn-xs"><a style="color: red" onclick="return confirm('Are you sure you want to suspend {{$user->first_name}}\'s account');"><i class="fa fa-times"></i> Suspend</a></button>
                                                @else
                                                    <button class="btn btn-default btn-xs"><a style="color: green" onclick="return confirm('Are you sure you want to activate {{$user->first_name}}\'s account');"><i class="fa fa-thumbs-o-up"></i> Activate</a></button>
                                                @endif
                                            </form>

                                        </td>

                                        <td>
                                            <button class="btn btn-default btn-xs"><a href="/admin-section/users/{{$user->id}}/edit" onclick="return confirm('Are you sure you want to edit {{$user->first_name}}\'s account');"><i class="fa fa-pencil-square-o"></i> Edit</a></button>
                                        </td>


                                        <td>
                                            <form action="/admin-section/users/{{$user->id}}/delete" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-default btn-xs"><a onclick="return confirm('Are you sure you want to delete {{$user->first_name}}\'s account');"><i class="fa fa-trash-o"></i> Delete</a></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if($user->count() > 7)
                                <h4 class="text-center"><a href="/admin-section/users/all/">See all Users</a></h4>
                            @endif
                        </div>

                    </section>

                    <div class=" add-task-row">
                        <a class="btn btn-primary btn-sm pull-left" onclick="return confirm('Are you sure you want to create a new account?')" href="/admin-section/users/create/">Create New Account</a>
                    </div>
                </div>



            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-md-7">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>User Registration Requests</strong>
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Request Sent On</th>
                                    <th>Occupation</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reqs as $req)
                                    <tr>
                                        <td><a href="/admin-section/reg-req/{{$req->id}}">{{$req->first_name}} {{$req->last_name}}</a></td>
                                        <td>{{$req->created_at}}</td>
                                        <!-- <td>Steve</td> -->
                                        <td>{{$req->what_are_you}}</td>
                                        <!-- <td>$1500</td> -->
                                        <td>{{$req->phone_number}}</td>
                                        <td>{{$req->email}}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td><strong>There are No Registration Requests</strong></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
                <div class="col-md-5">
                    <section class="panel tasks-widget">
                        <header class="panel-heading">
                            <strong>Suspended Users</strong>
                        </header>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Membership Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sus_users as $user)
                                <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td>{{$user->user_status}}</td>
                                    <td>
                                        <form action="/admin-section/users/{{$user->id}}/suspend" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            @if($user->is_active)
                                                <button class="btn btn-default btn-xs"><a style="color: red" onclick="return confirm('Are you sure you want to suspend {{$user->first_name}}\'s account');"><i class="fa fa-times"></i> Suspend</a></button>
                                            @else
                                                <button class="btn btn-default btn-xs"><a style="color: green" onclick="return confirm('Are you sure you want to activate {{$user->first_name}}\'s account');"><i class="fa fa-thumbs-o-up"></i> Activate</a></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><strong>No Users Have Been Suspended</strong></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>

        </section><!-- /.content -->
    </aside>
@endsection

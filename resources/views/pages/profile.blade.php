@extends('layouts.shell')

@section('title')
    <title>{{Auth::user()->first_name}} {{Auth::user()->last_name}}'s account - Legal Indaba</title>
    <meta name="description" content="Legal Indaba profile page for {{Auth::user()->first_name}}" />

@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a>Users</a></li>
                <li><a>{{Auth::user()->username}}</a></li>
            </ul>
            <h1>Welcome, {{Auth::user()->first_name}}</h1>
        </div>
    </section>

    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 column">
                    <div class="heading">
                        <h2>Account Details</h2>
                        @if(session()->has('message'))
                            <strong><p>{{session('message')}}</p></strong>
                        @endif
                    </div>
                    <div id="toggle-widget" class="experties">
                        <h2><i class="fa fa-user"></i>First Name:  <span style="float: right;font-size: 20px"><strong>{{Auth::user()->first_name}}</strong></span></h2>

                        <h2><i class="fa fa-user"></i>Last Name: <span style="float: right;font-size: 20px"><strong>{{Auth::user()->last_name}}</strong></span></h2>

                        <h2><i class="fa fa-envelope"></i>Email Address: <span style="float: right;font-size: 20px"><strong>{{Auth::user()->email}}</strong></span></h2>

                        <h2><i class="fa fa-user"></i>Username: <span style="float: right;font-size: 20px"><strong>{{Auth::user()->username}}</strong></span></h2>

                        <h2><i class="fa fa-gavel"></i>Type of User: <span style="float: right;font-size: 20px"><strong>{{Auth::user()->user_status}}</strong></span></h2>

                        <h2><i class="fa fa-database"></i>Status: <span style="float: right;font-size: 20px">
                                <strong>
                                    @if(Auth::user()->is_active)
                                        Active
                                    @else
                                        Deactivated
                                    @endif
                                </strong></span>
                        </h2>
                        {{--<h2 class="text-center"><a href="">Edit Profile</a> <span style="padding-left: 20px"><a href="">Change Password</a></span></h2>--}}

                        <p class="text-center">
                            <button class="btn btn-default btn-s" data-toggle="modal" data-target="#myModal">
                                Edit Your Profile
                            </button>
                        </p>
                        <p class="text-center">
                            <br>
                            <button class="btn btn-default btn-s" data-toggle="modal" data-target="#passModal">
                                Change Your Password
                            </button>
                        </p>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Your Profile</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/admin-section/users/{{Auth::user()->id}}/" role="form">
                                            {{csrf_field()}}
                                            {{method_field("PUT")}}

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" value="{{Auth::user()->first_name}}" placeholder="Please Enter First Name" name="first_name" required/>
                                            </div>


                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" value="{{Auth::user()->last_name}}" placeholder="Please Enter Last Name" name="last_name" required/>
                                            </div>


                                            <div class="form-group">
                                                <label>E-Mail Address</label>
                                                <input type="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Please Enter Email" name="email" required/>
                                            </div>

                                            <input type="hidden" name="type" value="{{Auth::user()->user_status}}">

                                            <button onclick="return confirm('Are you sure you want to edit your profile?');" type="submit" class="btn btn-primary">Save</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Change Your Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin-section/users/{{Auth::user()->id}}/password/" method="POST">
                                            {{csrf_field()}}
                                            {{method_field("PUT")}}
                                            <p>Old Password:</p>

                                            <input class="form-control" name="old_password" required="required" type="password" id="old_password" />
                                            <p>New Password:</p>
                                            <input class="form-control" name="password" required="required" type="password" id="password" oninput="check2(this)"/>
                                            <p>Confirm Password:</p>
                                            <input class="form-control" name="password_confirm" required="required" type="password" id="password_confirm" oninput="check(this)" />
                                            <script language='javascript' type='text/javascript'>
                                                function check(input) {
                                                    if (input.value != document.getElementById('password').value) {
                                                        input.setCustomValidity('Password Must be Matching.');
                                                    } else {
                                                        input.setCustomValidity('');
                                                    }

                                                }

                                                function check2(input){
                                                    if(input.value == document.getElementById('old_password').value){
                                                        input.setCustomValidity('Your new and old password must be different');
                                                    }else{
                                                        input.setCustomValidity('');
                                                    }
                                                }
                                            </script>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        <br/><br />

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 column">
                    <div class="heading">
                        <span>You have full access to all the Legal Indaba articles</span>
                        <h2>Categories</h2>
                    </div>
                    <div class="widget">
                        <ul class="category-count-widget">
                            @foreach($columns as $column)
                                <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a><i>{{$column->articles->count()}}</i></li>
                            @endforeach
                        </ul><!-- Category Caount Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit {{$user->first_name}} {{$user->last_name}}'s account
                        </header>
                        <div class="panel-body">
                            <form action="/admin-section/users/{{$user->id}}/" method="POST"  role="form">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name ="first_name" value="{{$user->first_name}}" required>

                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name ="last_name" value="{{$user->last_name}}" required>

                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name ="email" value="{{$user->email}}" required>

                                </div>

                                <div class="form-group">
                                    <label for="type">Type of User</label>
                                    <select name="type" class="form-control input-lg m-b-10">
                                        <option value="LAZ Member">LAZ Member</option>
                                        <option value="Non LAZ Member">Non LAZ Member</option>
                                        <option value="Student">Student</option>
                                        <option value="Guest">Guest</option>
                                    </select>
                                </div>

                                <button onclick="return confirm('Are you sure you want to edit this User Account?');" type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div><!--row1-->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
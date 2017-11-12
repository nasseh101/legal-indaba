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
                            ADD New User
                        </header>
                        <div class="panel-body">
                            <form action="/admin-section/users/store" method="POST"  role="form">

                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name ="first_name" placeholder="Enter First Name" required>

                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name ="last_name" placeholder="Enter Last Name" required>

                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name ="email" placeholder="Enter Email Address" required>

                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Password" required>
                                </div>

                                <div class="form-group">
                                    <label for="category">Type of User</label>
                                    <select name="type" class="form-control input-lg m-b-10">
                                        <option value="LAZ Member">LAZ Member</option>
                                        <option value="Non LAZ Member">Non LAZ Member</option>
                                        <option value="Student">Student</option>
                                        <option value="Guest">Guest</option>
                                    </select>
                                </div>

                                <button onclick="return confirm('Are you sure you want to create this User Account?');" type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div><!--row1-->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
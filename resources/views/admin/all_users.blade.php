@extends('admin.layout.shell')
@section('content')
    <aside class="right-side">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong >All Users</strong>

                            <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for a user by their name...">
                            <br>
                            <div class=" add-task-row">
                                <a class="btn btn-primary btn-sm pull-left" onclick="return confirm('Are you sure you want to create a new account?')" href="/admin-section/users/create/">Create New Account</a>
                            </div>

                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover" id="users">
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
                            {{--{{$users->links()}}--}}
                        </div>

                    </section>

                </div>



            </div>
            <br>
            <br>

        </section><!-- /.content -->
    </aside>
@endsection

@section('script')
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("users");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection

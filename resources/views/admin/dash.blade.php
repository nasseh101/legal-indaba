@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>Card Message</strong>
                        </header>
                        <div class="panel-body">
                            <h3>
                                @if($latest_message)
                                    {{$latest_message->message}}
                                @else
                                    - Nothing Posted -
                                @endif
                            </h3>
                            <button class="btn btn-default btn-s" data-toggle="modal" data-target="#myModal">
                                Post New Message
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Post a new message to card</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin-section/message" method="POST">
                                                {{csrf_field()}}

                                                <input class="form-control" name="message" required="required" type="text" id="message"/>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Post</button>
                                            </form>
                                            <br/><br />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>Current Issue's Articles</strong>
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Article Title</th>
                                    <th>Writer</th>
                                    <th>Column</th>
                                    <th>Issue #</th>
                                    <!-- <th>Price</th> -->

                                </tr>
                                </thead>
                                <tbody>
                                        @forelse($articles as $article)
                                            <tr>
                                                <td>{{$article->article_title}}</td>
                                                <td>{{$article->writer_name}}</td>
                                                <td>{{$article->column->name}}</td>
                                                <td>{{$article->issue_id}}</td>
                                                <td><a class="btn btn-default btn-xs" onclick="return confirm('Are you sure you want to edit this article?');" href="/admin-section/articles/{{$article->id}}/edit"><i class="fa fa-pencil-square-o"></i> Edit</a></td>

                                                <td><form action="/admin-section/articles/{{$article->id}}" method="POST">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}
                                                        <button class="btn btn-default btn-xs"><a onclick="return confirm('Are you sure you want to delete this article?');"><i class="fa fa-trash-o"></i> Delete</a></button>
                                                    </form>
                                                </td>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td>No Articles Have Been Posted to this issue yet</td>
                                            </tr>
                                        @endforelse

                                </tbody>
                            </table>
                        </div>
                    </section>


                </div>


            </div>
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
                            @forelse($users as $user)
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
            <!-- row end -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection


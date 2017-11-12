@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-md-offset-2">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>{{$req->first_name}} {{$req->last_name}} sent a subscription request</strong>
                        </header>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <ul class="list-group teammates">
                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->first_name}} {{$req->last_name}}</h4>
                                            <a href="">Name:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->email}}</h4>
                                            <a href="">Email</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->phone_number}}</h4>
                                            <a href="">Phone Number:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$dob}}</h4>
                                            <a href="">Date of Birth:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->what_are_you}}</h4>
                                            <a href="">Occupation: </a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->firm}}</h4>
                                            <a href="">Firm/Institution:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->position_held}}</h4>
                                            <a href="">Position Held:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$adm}}</h4>
                                            <a href="">Admission Date:</a>
                                        </li>

                                        <li class="list-group-item">
                                            <h4 class="pull-right" style="color:rgb(0,0,67)">{{$req->mem_number}}</h4>
                                            <a href="">Membership/Student Number:</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p>If you click the button below you are acknowledging receipt of the request. The request will be deleted after.</p>
                            <form action="/admin-section/reg-req/{{$req->id}}" method="POST" role="form">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button type="submit" onclick="return confirm('Are you sure you sure? The request will be deleted after you confirm.')" class="btn btn-primary">Request Received</button>
                            </form>

                        </div>
                    </section>

                </div>
            </div><!--row1-->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
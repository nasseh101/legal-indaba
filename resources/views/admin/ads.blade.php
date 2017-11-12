@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            BANNER ADS
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Link</th>
                                    <th>Ad Media</th>
                                    <!-- <th>Price</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                @if ($ads != null)
                                    @foreach($ads as $ad)
                                        <tr>

                                            <td>{{$ad->company}}</td>
                                            <td>{{$ad->link}}</td>
                                            <td>{{$ad->link}}</td>

                                            <td><a class="btn btn-success btn-sm pull-left" href="#">Edit</a></td>

                                            <td><a class="btn btn-danger btn-sm pull-left" href="#">Delete</a></td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
       </section>
    </aside>

@endsection
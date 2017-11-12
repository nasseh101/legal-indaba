@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <header class="panel-heading">
                           Issues
                        </header>

                        <ul class="list-group teammates">
                            <?php
                            for($i = (sizeof($issues) - 1);$i >= 0;$i--){
                                $img = asset("images/logo_small.png");
                                $data = <<<DELIMETER
                            <li class="list-group-item">
                                    <a href=""><img src={$img} width="50" height="50"></a>
                                    <span class="pull-right label label-danger inline m-t-15"></span>

                                    <a href="">Issue {$issues[$i]->id}</a>
                            <button class="btn btn-primary btn-addon btn-sm" style="float:right;">
                                <i class="fa fa-gear"></i>
                                <a style="color: #fff" href="/admin-section/issues/manage/{$issues[$i]->id}/">Manage Articles</a>
                            </button>
                            </li>

DELIMETER;

                                echo $data;
                            }
                            ?>

                        </ul>
                        <div class="panel-footer bg-white">
                            <!-- <span class="pull-right badge badge-info">32</span> -->
                            <button class="btn btn-primary btn-addon btn-sm">
                                <i class="fa fa-plus"></i>
                                <a style="color: #fff" onclick="return confirm('Are you sure you 100% want to post a new Issue?')" href="/admin-section/issues/add">Post New Issue</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <section class="panel tasks-widget">
                        <header class="panel-heading">
                           Columns
                        </header>
                        <div class="panel-body">

                            <div class="task-content">

                                <ul class="task-list">

                                    @foreach($columns as $column)
                                        <li>
                                            <div class="task-title">
                                                <span class="task-title-sp">{{$column->name}}</span>
                                                <div class="pull-right hidden-phone">
                                                    <button class="btn btn-default btn-xs"><a onclick="return confirm('Are you sure you want to edit this column?')" href="/admin-section/columns/{{$column->id}}/edit "><i class="fa fa-pencil-square-o"></i> Edit</a></button>

                                                    {{--<form action="/admin-section/columns/{{$column->id}}" method="POST">--}}
                                                        {{--{{csrf_field()}}--}}
                                                        {{--{{method_field('DELETE')}}--}}
                                                    {{--<button class="btn btn-default btn-xs"><a onclick="return confirm('Are you sure you want to delete this column?');"><i class="fa fa-times"></i>Delete</a></button>--}}
                                                    {{--</form>--}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class=" add-task-row">
                                <a class="btn btn-primary btn-sm pull-left" onclick="return confirm('Are you sure you want to add a new column?')" href="/admin-section/columns/create ">Add New Column</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- row end -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection


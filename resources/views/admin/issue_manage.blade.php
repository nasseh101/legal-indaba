@extends('admin.layout.shell')

@section('content')
    <aside class="right-side">

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <header class="panel-heading">
                            Columns
                        </header>

                        <ul class="list-group teammates">

                            @foreach($columns as $column)
                                <li class="list-group-item" style="border: 2px solid black">
                                    <a href=""><img src={{asset("images/logo_small.png")}} width="50" height="50"></a>
                                    <span class="pull-right label label-danger inline m-t-15"></span>

                                    <a href="">{{$column->name}}</a>
                                    <button class="btn btn-primary btn-addon btn-sm" style="float:right;">
                                        <i class="fa fa-plus"></i>
                                        <a style="color: #fff" onclick="return confirm('Are you sure you want to add an article to {{$column->name}}?');" href="/admin-section/articles/add/{{$issue_id}}/{{$column->id}}/">Add Article</a>
                                    </button>

                                    {{--@foreach($articles as $article)--}}
                                    {{--@if($article->column_id === $column->id)--}}
                                    {{--<p><strong>{{$article->article_title}}</strong></p>--}}
                                    {{--@endif--}}
                                    {{--@endforeach--}}
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count = 0;
                                        for($i = 0; $i < sizeof($articles); $i++){
                                            if($articles[$i]->column_id === $column->id){
                                                $csfr = csrf_field();
                                                $method = method_field('DELETE');
                                                $data = <<<DELIMETER
                                                    <tr>
                                                        <td>{$articles[$i]->article_title}</td>
                                                        <td><a class="btn btn-default btn-xs" onclick="return confirm('Are you sure you want to edit this article?');" href="/admin-section/articles/{$articles[$i]->id}/edit"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
                                                        <td><form action="/admin-section/articles/{$articles[$i]->id}" method="POST">
                                                                {$csfr}
                                                                {$method}
                                                                <button class="btn btn-default btn-xs"><a onclick="return confirm('Are you sure you want to delete this article?');"><i class="fa fa-trash-o"></i> Delete</a></button>
                                                             </form>
                                                        </td>
                                                    </tr>



DELIMETER;

                                                echo $data;
                                                $count++;
                                            }
                                        }

                                        if($count < 1){
                                            echo "<p><strong>No Articles Posted</strong></p>";
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </li>
                            @endforeach
                        </ul>
                        <div class="panel-footer bg-white">
                            <!-- <span class="pull-right badge badge-info">32</span> -->
                            <button class="btn btn-primary btn-addon btn-sm">
                                <i class="fa fa-plus"></i>
                                <a style="color: #fff" href="/admin-section/issues/">Finish</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- row end -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
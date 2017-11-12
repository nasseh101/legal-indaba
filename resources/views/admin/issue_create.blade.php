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
                            <strong>Only create a new issue when you want to begin posting articles to it.</strong>
                        </header>
                        <div class="panel-body">
                            <p>Creating a new issue and not uploading any articles to it will result in the hompage article section being blank as it is trying to get articles from the most recent issue.</p>
                            <p>Click the button below to continue.</p>
                            <p>The Issue title can be left blank if not applicable.</p>
                            <form action="/admin-section/issues" method="POST" role="form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input  type="text" name="name" style="width: 400px" placeholder="Title of Issue">
                                    <br>
                                    <br>
                                    <button type="submit" onclick="return confirm('Are you sure you 100% sure you want to post a new issue?')" class="btn btn-primary">CREATE A NEW ISSUE</button>
                                </div>
                            </form>

                        </div>
                    </section>
                </div>
            </div><!--row1-->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
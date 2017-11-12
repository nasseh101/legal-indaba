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
                            ADD A COLUMN
                        </header>
                        <div class="panel-body">
                            <form action="/admin-section/columns" method="POST"  role="form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Column Name</label>
                                    <input type="text" class="form-control" id="name" name ="name" placeholder="Enter Column Name" required>

                                </div>

                                <div class="form-group">
                                    <label for="description">Column Description</label>
                                    <input type="text" class="form-control" id="description" name = "description" placeholder="Enter Column Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="category">Column Category</label>
                                    <select name="category" class="form-control input-lg m-b-10">
                                        <option value="1">Talking Back</option>
                                        <option value="3">Growing In the Law</option>
                                        <option value="4">Keeping Abreast</option>
                                        <option value="5">The Lawyer</option>
                                    </select>
                                </div>

                                <button onclick="return confirm('Are you sure you want to create this column?');" type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div><!--row1-->


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
@endsection
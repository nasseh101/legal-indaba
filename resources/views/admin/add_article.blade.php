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
                            Add Article to <strong>{{$column->name}}</strong>
                        </header>
                        <div class="panel-body">
                                {{csrf_field()}}
                            {!!Form::open(array(
                                        'url' => '/admin-section/articles/',
                                        'method' => 'post',
                                         'class' => 'form',
                                         'files' => true))
                                         !!}

                            <div class="form-group">
                                {!! Form::label('article_title', 'Article Title:') !!}
                                {!! Form::text('article_title', null, ['required' => 'required', 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('article_desc', 'Article Sample:') !!}
                                {!! Form::textarea('article_desc', null, ['class' => 'form-control']) !!}
                                <p class="help-block">Add a sample of the article that users that aren't logged in can see.</p>
                            </div>


                            <div class="form-group">
                                {!! Form::hidden('col_id', $column->id, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('issue_id', $issue_id, ['class' => 'form-control']) !!}
                            </div>

                            <br>
                            <div class="form-group">
                                {!! Form::label('article_img', 'Subject Image:') !!}
                                {!! Form::file('article_img',null,['class'=>'form-control']) !!}
                                <p class="help-block">Upload the subject image here. <span STYLE="font-size: 20px;text-decoration: underline"><strong>IMAGE HAS TO BE 740 x 360</strong></span></p>
                            </div>
                            <br>

                            <hr>

                            <p>Writer Information</p>

                            <div class="form-group">
                                {!! Form::label('writer_name', 'Writer Name:') !!}
                                {!! Form::text('writer_name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('writer_info', 'About the Writer:') !!}
                                {!! Form::text('writer_info', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('writer_img', 'Picture of Writer:') !!}
                                {!! Form::file('writer_img',null,['class'=>'form-control']) !!}
                                <p class="help-block">Upload the writer's picture here.</p>
                            </div>
                            <br>

                            <hr>
                            <p><strong style="font-size: 25px">If you would like to upload a document instead of type it out, use this section. Otherwise Ignore it.</strong></p>
                            <div class="form-group">
                                {!! Form::label('my_article', 'Article PDF:') !!}
                                {!! Form::file('my_article',null,['class'=>'form-control']) !!}
                                <p class="help-block">Upload the article pdf here</p>
                            </div>
                            <hr>

                            <br>
                            <p><strong style="font-size: 25px">If you would like to type out the article instead, use this section.</strong></p>


                            <div class="form-group">
                                {!! Form::label('article_text', 'Article Text:') !!}
                                {!! Form::textarea('article_text', null, ['class' => 'form-control']) !!}
                            </div>

                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'article_text' );
                                CKEDITOR.replace( 'article_desc' );
                            </script>

                            <br>
                            <div class="form-group">
                                {!! Form::submit('Post Article',['class' => 'btn btn-primary form-control' , 'onclick' => 'return confirm("Are you sure you want to post this article");']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </aside>
@endsection()
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
                            Edit '{{$article->article_title}}'
                        </header>
                        <div class="panel-body">
                            {{csrf_field()}}
                            {!!Form::open(array(
                                        'url' => '/admin-section/articles/' . $article->id,
                                        'method' => 'post',
                                         'class' => 'form',
                                         'files' => true))
                                         !!}

                            {{method_field('PUT')}}

                            <div class="form-group">
                                {!! Form::label('article_title', 'Article Title:') !!}
                                {!! Form::text('article_title',$article->article_title, ['required' => 'required', 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('article_desc', 'Article Sample:') !!}
                                {!! Form::textarea('article_desc', $article->article_desc, ['class' => 'form-control']) !!}
                                <p class="help-block">Add a sample of the article that users that aren't logged in can see.</p>
                            </div>

                            <br>
                            <hr>

                            <div class="form-group">
                                {!! Form::label('article_img', 'Subject Image:') !!}
                                {!! Form::file('article_img',null,['class'=>'form-control']) !!}
                                <p class="help-block">If's you're editing the article, you have to re-upload the subject image. <span STYLE="font-size: 20px;text-decoration: underline"><strong>IMAGE HAS TO BE 740 x 360. OR THE WIDTH HAS TO BE <span style="color: red">2.05</span> TIMES THE HEIGHT, eg 640 x 312</strong></span></p>
                            </div>
                            <br>
                            <hr>
                            <p>Edit Writer Information</p>

                            <div class="form-group">
                                {!! Form::label('writer_name', 'Writer Name:') !!}
                                {!! Form::text('writer_name', $article->writer_name, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('writer_info', 'About the Writer:') !!}
                                {!! Form::text('writer_info', $article->writer_info, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('writer_img', 'Picture of Writer:') !!}
                                {!! Form::file('writer_img',null,['class'=>'form-control']) !!}
                                <p class="help-block"><strong>If's you're editing the article, you have to re-upload the writer image</strong></p>
                            </div>
                            <br>
                            <hr>

                            @if($article->yumpu_id != null)
                                <hr>
                                <br>
                                <p><strong style="font-size: 25px">You cannot edit the uploaded document. You'd have to delete the article and reupload.</strong></p>
                            @else
                                <p><strong style="font-size: 25px">Edit the article text.</strong></p>
                                <div class="form-group">
                                    {!! Form::label('article_text', 'Article Text:') !!}
                                    {!! Form::textarea('article_text', $article->article_text, ['class' => 'form-control']) !!}
                                </div>
                            @endif


                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'article_desc' );
                                CKEDITOR.replace( 'article_text' );

                            </script>

                            <br>
                            <div class="form-group">
                                {!! Form::submit('Edit Article',['class' => 'btn btn-primary form-control', 'onclick' => 'return confirm("Are you sure you want to edit this article");']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </aside>
@endsection()
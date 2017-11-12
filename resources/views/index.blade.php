@extends('layouts.shell')

@section('title')
    <title>Home - Legal Indaba</title>
    <meta name="description" content="Legal Indaba, Promoting the exchange of views and intellectual discourse in the legal profession." />

@endsection

@section('content')
    <section class="block no-padding">
        <ul class="wide-carousal-post">
            <li>
                <div class="post-style16" itemscope itemType="http://schema.org/BlogPosting">
                    <img itemprop="image" src="images/resource/1.jpg" alt="" />
                    <div class="post-detail16">
                        <img itemprop="image" src="images/logo.png" style="width: 150px;" alt="" />
                        <p itemprop="description">Promoting the exchange of views and intellectual discourse in the legal profession</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-style16" itemscope itemType="http://schema.org/BlogPosting">
                    <img itemprop="image" src="images/resource/2.jpg" alt="" />
                    <div class="post-detail16">
                        <img itemprop="image" src="images/logo.png" style="width: 150px;" alt="" />
                        <p itemprop="description">Keeping the student connected to the profession while informing, challenging, growing the budding professional.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-style16" itemscope itemType="http://schema.org/BlogPosting">
                    <img itemprop="image" src="images/resource/3.jpg" alt="" />
                    <div class="post-detail16">
                        <img itemprop="image" src="images/logo.png" style="width: 150px;" alt="" />
                        <p itemprop="description">Promoting the values of the profession by connecting our past to our present.</p>
                    </div>
                </div>
            </li>

        </ul>
    </section>


    <section class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 column">
                    <section class="block remove-top">
                        <br>
                        <br>
                        <div class="heading">
                            @if($latest_issue->issue_name)
                                <span>{{$latest_issue->issue_name}}</span>
                            @endif
                            <h2>LATEST ISSUE</h2>
                        </div><!-- Heading -->
                        <div class="post-tabs">
                            <ul class="nav nav-tab">
                                <li class="active"><a data-toggle="tab" href="#tab1"><i class="fa fa-gavel"></i>News Features</a></li>
                                <li><a data-toggle="tab" href="#tab2"><i class="fa fa-newspaper-o"></i>Other Articles</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="top-margin">
                                        <div class="row">
                                            @forelse($articles as $article)
                                                @if($article->column_id == 3)
                                                    <div class="col-md-6">
                                                        <div class="post-style4" itemscope itemType="http://schema.org/BlogPosting">
                                                            <div class="post-thumb4">
                                                                @if($article->has_subj_image)
                                                                    @php
                                                                    $img = str_slug($article->article_title)
                                                                    @endphp
                                                                    <img alt="" style="width: 100%" src={{asset("articles/$article->column_id/$article->issue_id/$img.jpg")}} itemprop="image">
                                                                @else
                                                                    <img alt="" style="width: 100%" src={{asset("images/no_img.png")}} itemprop="image">
                                                                @endif
                                                            </div>
                                                            <div class="post-metas4">
                                                                <div class="date">
                                                                    <ul>
                                                                        <li><a>{{$article->writer_name}}</a></li>
                                                                        <li><a>Issue {{$article->issue_id}}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h3 itemprop="headline"><a title="" href="/articles/{{$article->issue_id}}/{{str_slug($article->column->name)}}/{{$article->id}}/{{str_slug($article->article_title)}}" itemprop="url">{{$article->article_title}}</a></h3>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                <div class="col-md-6 col-md-offset-3">
                                                    <br>
                                                    <img src="{{asset('images/nothing.png')}}">
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane fade">
                                    <div class="top-margin">
                                        <div class="row">
                                            @forelse($articles as $article)
                                                @if($article->column_id != 3)
                                                    <div class="col-md-6">
                                                        <div itemtype="http://schema.org/BlogPosting" itemscope="" class="post-style1">
                                                            <div class="post-thumb1">
                                                                @if($article->has_subj_image)
                                                                    @php
                                                                    $img = str_slug($article->article_title)
                                                                    @endphp
                                                                    <img alt="" src={{asset("articles/$article->column_id/$article->issue_id/$img.jpg")}} itemprop="image">
                                                                @else
                                                                    <img alt="" src={{asset("images/no_img.png")}} itemprop="image">
                                                                @endif
                                                            </div>
                                                            <h3 itemprop="headline"><a title="" href="/articles/{{$article->issue_id}}/{{str_slug($article->column->name)}}/{{$article->id}}/{{str_slug($article->article_title)}}" itemprop="url">{{$article->article_title}}</a></h3>

                                                            <div class="date">
                                                                <ul>
                                                                    <li><a>{{$article->writer_name}}</a></li>
                                                                    <li><a>Issue {{$article->issue_id}}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- Post Style 1 -->
                                                    </div>
                                                @endif
                                            @empty
                                                <div class="col-md-6 col-md-offset-3">
                                                    <br>
                                                    <img src="{{asset('images/nothing.png')}}">
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <section class="block remove-top">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="adplugg-tag" data-adplugg-zone="bottom_banner"></div>
                                {{--<img alt="" src={{asset("images/resource/ban.jpg")}} itemprop="image">--}}

                            </div>
                        </div>
                    </section>

                </div>
                <aside class="col-md-4 column">

                    <div class="widget">
                        <div class="add">
                            <div class="adplugg-tag" data-adplugg-zone="side_bar"></div>
                            {{--<a href="#" title="" itemprop="url"><img style="width: 100%" src={{asset("images/resource/ban.jpg")}}  alt="" itemprop="image" /></a>--}}
                        </div>
                    </div>

                    <div class="widget">
                        <h3 class="heading4"></h3>
                        <div class="top-margin">
                            <div itemtype="http://schema.org/BlogPosting" itemscope="" class="post-style7">
                                <div class="post-thumb7">
                                    <img alt="" src={{asset("images/resource/side2.jpg")}} itemprop="image">
                                </div>
                                <div class="post-detail7">
                                    @if(Auth::check())
                                        <h3 itemprop="headline"><a title="" href="/account/" itemprop="url">Greetings, {{Auth::user()->first_name}}</a></h3>
                                    @else
                                        <h3 itemprop="headline"><a title="" href="/register" itemprop="url">Log In to get gain full access to articles</a></h3>
                                    @endif
                                </div>
                            </div><!-- Post Style 7 -->

                            @if($latest_message)
                                <div itemtype="http://schema.org/BlogPosting" itemscope="" class="post-style7">
                                    <div class="post-thumb7">
                                        <img alt="" src={{asset("images/resource/side3.jpg")}} itemprop="image">
                                    </div>
                                    <div class="post-detail7">
                                        <h3 itemprop="headline"><a title="" itemprop="url">{{$latest_message->message}}</a></h3>
                                    </div>
                                </div><!-- Post Style 7 -->
                            @endif

                            <div itemtype="http://schema.org/BlogPosting" itemscope="" class="post-style7">
                                <div class="post-thumb7">
                                    <img alt="" src={{asset("images/resource/side1.jpg")}} itemprop="image">
                                </div>
                                <div class="post-detail7">
                                    <h3 itemprop="headline"><a title="" href="/contact-us/" itemprop="url">Do not hesitate to contact us.</a></h3>
                                </div>
                            </div><!-- Post Style 7 -->

                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection
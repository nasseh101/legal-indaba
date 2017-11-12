@extends('layouts.shell')
@section('title')
    <title>Issue {{$issue_id}} Articles - Legal Indaba</title>
    <meta name="description" content="Legal Indaba, Zambian Legal Magazine. All articles from Issue {{$issue_id}}" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a>Issue {{$issue_id}}</a></li>
            </ul>
            <h1>Issue {{$issue_id}}
                @if($issue->issue_name)
                    ({{$issue->issue_name}})
                @endif
            </h1>
        </div>
    </section>

    <section class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 column">
                    <section class="block remove-top">
                        <br>
                        <br>

                        <div class="post-tabs">
                            <div class="tab-content">
                                <div class="top-margin">
                                    <div class="row">
                                        <div class="col-md-12">

                                            @forelse($articles as $article)
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
                                                        <div class="date">
                                                            <ul>
                                                                <li><a>{{$article->writer_name}}</a></li>
                                                                <li><a>Issue {{$article->issue_id}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <h3 itemprop="headline"><a title="" href="/articles/{{$article->issue_id}}/{{str_slug($article->column->name)}}/{{$article->id}}/{{str_slug($article->article_title)}}" itemprop="url">{{$article->article_title}}</a></h3>
                                                    </div><!-- Post Style 1 -->
                                                </div>
                                            @empty
                                                <div class="col-md-6 col-md-offset-3">
                                                    <br>
                                                    <img src="{{asset('images/nothing.png')}}">
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div><!-- Post Tabs -->

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
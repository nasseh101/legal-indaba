@extends('layouts.shell')

@section('title')
    <title>{{$article->article_title}} Preview - Legal Indaba</title>
    <meta name="description" content="Legal Indaba, Zambian Legal Magazine. {{$article->article_title}}" />
    <meta property="og:url"                content="{{url()->current()}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$article->title}}" />
    <meta property="og:description"        content="{{$article->article_desc}}" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a href="/articles/issue-{{$article->issue_id}}" title="">Issue {{$article->issue_id}}</a></li>
                <li><a title="">{{$article->column->name}}</a></li>
                <li><a>{{$article->article_title}}</a></li>
            </ul>
            <h1>{{$article->article_title}} Preview</h1>
        </div>
    </section>

    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 column">
                    <div class="blog-single" itemscope itemType="http://schema.org/BlogPosting">
                        {{--<script type="text/javascript" src="//www.yumpu.com/assets/v4/js/modules/toddycat/bin/YumpuMagazine.min.js"></script>--}}

                        {{--<div id="myMagazineContainer" style="width:100%; height:744px;"></div>--}}
                        {{--<script>--}}
                        {{--var myYumpu = new Yumpu();--}}
                        {{--document.addEventListener("DOMContentLoaded", function(){--}}
                        {{--myYumpu.create_player("#myMagazineContainer", "{{$article->yumpu_id}}", { canvasBGColor:"#131352", fallback_order:"flash,html5,js" } );--}}
                        {{--});--}}
                        {{--</script>--}}

                        @if($article->has_subj_image)
                            @php
                            $img = str_slug($article->article_title)
                            @endphp
                            <div class="single-post-thumb">
                                <img itemprop="image" src={{asset("articles/$article->column_id/$article->issue_id/$img.jpg")}} alt="" />
                            </div>
                        @endif
                        <div class="post-single-info">
							<span itemprop="author">

                                @if($article->has_image)
                                    @php
                                    $img = str_slug($article->article_title)
                                    @endphp
                                    <img alt="" src={{asset("articles/$article->column_id/$article->issue_id/w$img.jpg")}} itemprop="image">
                                @else
                                    <img alt="" src={{asset("images/logo2.png")}} itemprop="image">
                                @endif


							</span>
                            <h1 itemprop="headline">{{$article->article_title}}</h1>
                            <ul>
                                <li><span>{{$article->writer_name}}</span></li>
                                <li><a itemprop="url" href="/articles/issue-{{$article->issue_id}}" title="">Issue {{$article->issue_id}}</a>
                                    @if($article->issue->issue_name)
                                        ({{$article->issue->issue_name}})
                                    @endif
                                </li>
                                <li><span>{{$article->column->name}}</span></li>
                            </ul>
                        </div>
                        <div class="blog-single-details">
                            <article class="blog-news-single">
                                <div class="blog-news-details blog-single-details">
                                    <?php
                                    $text = str_replace('  ', ' &nbsp;', $article->article_desc);
                                    echo $text;
                                    ?>
                                </div>
                            </article>

                            <h4 class="text-center"><a href="/articles/{{$article->issue_id}}/{{str_slug($article->column->name)}}/{{$article->id}}/{{str_slug($article->article_title)}}/full_view"><strong>Read Full Article</strong></a></h4>

                            <div class="who-post-sec">
                                <div class="who-post-author" itemprop="author">
                                    <span>
                                        @if($article->has_image)
                                            @php
                                            $img = str_slug($article->article_title)
                                            @endphp
                                            <img alt="" src={{asset("articles/$article->column_id/$article->issue_id/w$img.jpg")}} itemprop="image" style="width: 173px">
                                        @else
                                            <img alt="" src={{asset("images/logo2.png")}} itemprop="image" style="width: 173px">
                                        @endif
                                    </span>
                                    <div class="post-author-infos">
                                        <h3 itemprop="name"><a itemprop="url" href="" title="">{{$article->writer_name}}</a></h3>
                                        <span>Writer</span>
                                        <p itemprop="description">{{$article->writer_info}}</p>

                                    </div>
                                </div>
                            </div><!-- Who Post Sec -->

                        </div>


                    </div>

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
        </div><!-- Who Post Sec -->
        </div>
        </div>
    </section>

@endsection
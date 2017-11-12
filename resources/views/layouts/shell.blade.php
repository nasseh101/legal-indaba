<!DOCTYPE html>
<head>
    <script>
        (function(ac) {
            var d = document, s = 'script', id = 'adplugg-adjs';
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id; js.async = 1;
            js.src = '//www.adplugg.com/apusers/serve/' + ac + '/js/1.1/ad.js';
            fjs.parentNode.insertBefore(js, fjs);
        }('A48211638'));
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <meta name="keywords" content="legal, indaba, zambia, law, magazine, omora,lawyers, LAZ, ZIALE" />

    <link rel="shortcut icon" type="image/icon" href="{{asset('images/favicon.ico')}}"/>
    <!-- Styles -->
    <link rel="stylesheet" href={{asset("css/bootstrap.css")}} type="text/css" /><!-- Bootstrap -->
    <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}} type="text/css" /><!-- Font Awesome -->
    <link rel="stylesheet" href={{asset("css/style.css")}} type="text/css" /><!-- Style -->
    <link rel="stylesheet" href={{asset("css/article.css")}} type="text/css" /><!-- Style -->
    <link rel="stylesheet" href={{asset("css/responsive.css")}} type="text/css" /><!-- Responsive -->
    <link rel="stylesheet" href={{asset("css/perfect-scrollbar.css")}} /><!-- Scroll Bar -->
    <link rel="stylesheet" href={{asset("css/owl.carousel.css")}} type="text/css" /><!-- Owl Carousal -->
    <link rel="stylesheet" href={{asset("css/animate.css")}} type="text/css" /><!-- Animate -->
    <link rel="stylesheet" href={{asset("css/colors/color.css")}} type="text/css" /><!-- pink -->

</head>
<body itemscope="">
<div class="theme-layout">

    <header class="mag-header">
        <div class="top-bar2">
            <div class="container">
                <ul class="bar-btn">
                    <li><a title="" href="/contact-us/" itemprop="url">Contact us</a></li>
                    <li><a title="" href="/terms-and-conditions/" itemprop="url">Terms & Conditions</a></li>
                </ul>
                <ul class="social-btns">
                    <li><a itemprop="url" href="https://web.facebook.com/Legal-Indaba-1825829541015580/" title=""><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div><!-- Top Bar -->
        <div class="logo-bar">
            <div class="container">
                <div class="logo">
                    <a title="" href="/" itemprop="url"><img alt="" src={{asset("images/resource/logo.png")}} itemprop="image"></a>
                </div>
                <div class="ad">
                    <div class="adplugg-tag" data-adplugg-zone="top_banner"></div>
                    {{--<img alt="" src={{asset("images/resource/ban.jpg")}} itemprop="image">--}}
                </div>
            </div>
        </div><!-- Logo Bar -->
        <nav class="menu">
            <div class="container">
                <ul>
                    <li class="menu-item-has-children"><a itemprop="url" href="/" title="">Home</a></li>

                    <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Talking Back</a>
                        <ul>
                            @foreach($columns as $column)
                                @if($column->category === 1)
                                    <li class="menu-item-has-children"><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                                @endif
                            @endforeach
                        </ul><!-- drop-down -->
                    </li>

                    @foreach($columns as $column)
                        @if($column->category === 2)
                            <li class="menu-item-has-children"><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                        @endif
                    @endforeach

                    <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Growing In The Law</a>
                        <ul>
                            @foreach($columns as $column)
                                @if($column->category === 3)
                                    <li class="menu-item-has-children"><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                                @endif
                            @endforeach
                        </ul><!-- drop-down -->
                    </li>

                    <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Keeping Abreast</a>
                        <ul>
                            @foreach($columns as $column)
                                @if($column->category === 4)
                                    <li class="menu-item-has-children"><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                                @endif
                            @endforeach
                        </ul><!-- drop-down -->
                    </li>

                    <li class="menu-item-has-children"><a itemprop="url" href="#" title="">The Lawyer</a>
                        <ul>
                            @foreach($columns as $column)
                                @if($column->category === 5)
                                    <li class="menu-item-has-children"><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                                @endif
                            @endforeach
                        </ul><!-- drop-down -->
                    </li>

                    @if(Auth::check())
                        <li class="menu-item-has-children"><a itemprop="url" title="">Profile</a>
                            <ul>
                                <li><a href="/account/">My Account</a></li>


                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>


                            </ul>
                        </li>
                    @else
                        <li><a itemprop="url" href="/register" title="">Log In</a></li>
                    @endif

                </ul>
            </div>
        </nav>
    </header>

    <div class="responsive-header">
        <div class="top-bar">
            <div class="responsive-btn">
                <a href="#" title="" itemprop="url"><i class="fa fa-th"></i></a>
            </div><!-- Responsive Btn -->
            <ul class="social-btn">
                <li class="facebook"><a title="" href="https://web.facebook.com/Legal-Indaba-1825829541015580/" itemprop="url"><i class="fa fa-facebook"></i></a></li>
            </ul>
        </div><!-- Top Bar -->
        <div class="logo">
            <a href="#" title="" itemprop="url"><img src={{asset("images/resource/logo.png")}} alt="" itemprop="image" /></a>
        </div>
        <div class="add">
            <div class="adplugg-tag" data-adplugg-zone="top_banner"></div>
            {{--<a href="#" title="" itemprop="url"><img style="width: 100%" src={{asset("images/resource/ban.jpg")}}  alt="" itemprop="image" /></a>--}}
        </div>
        <div class="responsive-menu">
            <div class="close-btn">
				<span>
					<i class="fa fa-times"></i>
					Close
				</span>
            </div><!-- Close Btn -->
            <ul>
                <li><a itemprop="url" href="/" title="">Home</a></li>

                <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Talking Back</a>
                    <ul>
                        @foreach($columns as $column)
                            @if($column->category === 1)
                                <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                            @endif
                        @endforeach
                    </ul><!-- drop-down -->
                </li>

                @foreach($columns as $column)
                    @if($column->category === 2)
                        <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                    @endif
                @endforeach

                <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Growing In The Law</a>
                    <ul>
                        @foreach($columns as $column)
                            @if($column->category === 3)
                                <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                            @endif
                        @endforeach
                    </ul><!-- drop-down -->
                </li>

                <li class="menu-item-has-children"><a itemprop="url" href="#" title="">Keeping Abreast</a>
                    <ul>
                        @foreach($columns as $column)
                            @if($column->category === 4)
                                <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                            @endif
                        @endforeach
                    </ul><!-- drop-down -->
                </li>

                <li class="menu-item-has-children"><a itemprop="url" href="#" title="">The Lawyer</a>
                    <ul>
                        @foreach($columns as $column)
                            @if($column->category === 5)
                                <li><a itemprop="url" href="/columns/{{$column->id}}/{{str_slug($column->name)}}/" title="">{{$column->name}}</a></li>
                            @endif
                        @endforeach
                    </ul><!-- drop-down -->
                </li>

                @if(Auth::check())
                    <li class="menu-item-has-children"><a itemprop="url" href="/register" title="">{{Auth::user()->first_name}}</a>
                        <ul>
                            <li><a href="/account/">My Account</a></li>


                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>


                        </ul>
                    </li>
                @else
                    <li><a itemprop="url" href="/register" title="">Log In</a></li>
                @endif



            </ul>
        </div><!-- Responsive Menu -->
    </div><!-- Responsive Header -->


    @yield('content')

    <footer class="footer3">
        <div class="about-theme-sec">
            <section class="block">
                <div class="container">
                    <div class="about-strip">
                        <h3>About Legal Indaba</h3>
                        <p itemprop="description">LEGAL INDABA is a magazine by lawyers for lawyers to provide for intellectual discourse and keep members of the Legal profession and students of law abreast with
                            the latest developments in and around the profession with a view of inform, encourage and enhance best practices.</p>

                        <p>Do not hestitate to contact us to share information, your opinion, a paper , a concern or an advert.</p>
                        <ul class="social-btn">
                            <li><a itemprop="url" href="https://web.facebook.com/Legal-Indaba-1825829541015580/" title=""><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="bottom-line">
            <div class="container">
                <span>
                    Powered by <a href="http://omora.me"><img src={{asset("images/omora.png")}}></a>
                </span>

                <ul class="footer-menu">
                    <li>
                        <a>
                            © Copyright
                            <script language="JavaScript" type="text/javascript">
                                now = new Date
                                theYear=now.getYear()
                                if (theYear < 1900)
                                    theYear=theYear+1900
                                document.write(theYear)
                            </script>
                            Legal Indaba &nbsp;&nbsp;
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </footer>

</div>
<!-- Script -->
<script type="text/javascript" src="{{asset("js/modernizr.js")}}"></script><!-- modernizr -->
<script src={{asset("js/jquery-2.1.4.js")}}></script><!-- Jquery -->
<script type="text/javascript" src={{asset("js/bootstrap.min.js")}}></script><!-- Bootstrap -->
<script type="text/javascript" src={{asset("js/owl.carousel.min.js")}}></script><!-- Carousal -->
<script type="text/javascript" src={{asset("js/scrolltopcontrol.js")}}></script><!-- Scroll to Top -->
<script type="text/javascript" src={{asset("js/perfect-scrollbar.js")}}></script><!-- Scroll Bar -->
<script type="text/javascript" src={{asset("js/perfect-scrollbar.jquery.js")}}></script><!-- Scroll Bar -->
<script src={{asset("js/script.js")}}></script>
<script src={{asset("js/clock.js")}}></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
    $( document ).ready(function() {

        'use strict';

        $(".fancy-carousal").owlCarousel({
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:2000,
            loop:true,
            dots:false,
            nav:false,
            margin:0,
            items:1,
            singleItem:true
        });

        $(".wide-carousal-post").owlCarousel({
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:2000,
            loop:true,
            dots:false,
            nav:true,
            margin:0,
            items:1,
            singleItem:true
        });

    });
</script>

@yield('other')

</body>
</html>
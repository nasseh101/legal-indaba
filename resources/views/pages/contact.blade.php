@extends('layouts.shell')

@section('title')
    <title>Contact Us - Legal Indaba</title>
    <meta name="description" content="Legal Indaba Contact Page. Do not hestitate to contact us to share information, your opinion, a paper , a concern or an advert." />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a>Contact Us</a></li>
            </ul>
            <h1>Contact Us</h1>
        </div>
    </section>

    <section class="block gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 column">
                    <div class="contact-form">
                        <h3><i class="fa fa-comment-o"></i> LEAVE YOUR MESSAGE</h3>
                        <form method="POST" action="https://formspree.io/info@legalindaba.com">
                            <label><i class="fa fa-user"></i><input type="text" name="name" placeholder="Enter your Name"></label>
                            <label><i class="fa fa-envelope"></i><input type="text" name="_replyto" placeholder="Enter your Email"></label>
                            <label><i class="fa fa-comment-o"></i><textarea name="message" placeholder="Enter your Message"></textarea></label>
                            <input type="submit" value="SEND MESSAGE">
                        </form>
                    </div><!-- Contact Form -->
                </div>
                <div class="col-md-4 column">
                    <div class="contact-information">
                        <h3><i class="fa fa-info"></i> CONTACT INFORMATION</h3>
                        <p itemprop="description"> Do not hestitate to contact us to share information, your opinion, a paper ,a concern or an advert. </p>
                        <div class="contact-infos">
                            <span><img src="{{asset('images/LI.png')}}" alt="" /></span>
                            <ul>
                                <li>
                                    <span><i class="fa fa-map-marker"></i> Address</span>
                                    <p itemprop="description">Lusaka, Zambia</p>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone"></i> Phone</span>
                                    <p itemprop="description">+260 968 305067</p>
                                </li>
                                <li>
                                    <span><i class="fa fa-envelope-o"></i> Email</span>
                                    <p itemprop="description">info@legalindaba.com </p>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Contact Form -->
                </div>
            </div>
        </div>
    </section>

@endsection



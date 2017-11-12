@extends('layouts.shell')

@section('title')
    <title>Request Sent - Legal Indaba</title>
    <meta name="description" content="Subscription Request Successfully Sent" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a title="">Request Sent</a></li>
            </ul>
            <h1>Request Sent</h1>
        </div>
    </section>

    <section class="block gray">
        <div class="container">
            <div class="error-sec">
                <h3>Your request has been sent.</h3>
                <span>Your request has been successfully sent! We will get back to you with more details as soon as we can.</span>
                <img style="width: 50%" src="{{asset('images/LI.png')}}">

            </div>
        </div>
    </section>

@endsection
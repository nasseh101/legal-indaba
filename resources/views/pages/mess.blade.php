@extends('layouts.shell')

@section('title')
    <title>Reactivate Your Account - Legal Indaba</title>
    <meta name="description" content="Reactivate Your Account" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a title="">Reactivate Your Account</a></li>
            </ul>
            <h1>Reactivate Your Account</h1>
        </div>
    </section>

    <section class="block gray">
        <div class="container">
            <div class="error-sec">
                <h3>You only have access to article previews.</h3>
                <span>If you want to gain full access to all articles, pay your subscription fee to make sure your account is reactivated.</span>
                <img style="width: 50%" src="{{asset('images/LI.png')}}">

            </div>
        </div>
    </section>

@endsection
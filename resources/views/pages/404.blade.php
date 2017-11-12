@extends('layouts.shell')

@section('title')
    <title>Page Not Found - Legal Indaba</title>
    <meta name="description" content="404" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a title="">404</a></li>
            </ul>
            <h1>404</h1>
        </div>
    </section>

    <section class="block gray">
        <div class="container">
            <div class="error-sec">
                <h3>Oops! This Page is Not Available</h3>
                <span>Please go back to home and try to find out once again.</span>
                <h2>404</h2>
            </div>
        </div>
    </section>

@endsection
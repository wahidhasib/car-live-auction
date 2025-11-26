@extends('frontend.layout.master')

@section('title')
    404 Error
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_banner) }})">
        <div class="container">
            <h2 class="breadcrumb-title">404 Error</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">404 Error</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- error area -->
    <div class="error-area py-120">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <div class="error-wrapper">
                    <div class="error-img">
                        <img loading="lazy" src="{{ asset('frontend/img/error/404.png') }}" alt="404 error">
                    </div>
                    <h2>Opos... Page Not Found!</h2>
                    <p>The page you looking for not found may be it not exist or removed.</p>
                    <a href="{{ route('home') }}" class="theme-btn">Go Back Home <i class="far fa-home"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- error area end -->
@endsection

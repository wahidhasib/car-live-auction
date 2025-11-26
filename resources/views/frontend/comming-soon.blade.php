@extends('frontend.layout.master')

@section('title')
    Comming soon
@endsection

@section('content')
    <!-- coming soon -->
    <div class="coming-soon pt-120 pb-90" style="background: #161616;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="coming-soon-content text-white text-center">
                        <h1 class="text-white">We're Coming Soon</h1>
                        <p class="lead">Our website is under construction. We'll be here soon with our new awesome site,
                            subscribe to be notified.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-lg-5">
                    <form class="newsletter-form position-relative">
                        <input type="text" class="input-newsletter form-control" placeholder="Enter your email"
                            name="email" required="" autocomplete="off">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="coming-social">
                @if ($settings->facebook)
                    <a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if ($settings->twitter)
                    <a href="{{ $settings->twitter }}"><a href="#"><i class="fab fa-twitter"></i></a></a>
                @endif
                @if ($settings->instagram)
                    <a href="{{ $settings->instagram }}"><i class="fab fa-instagram"></i></a>
                @endif
                @if ($settings->linkedin)
                    <a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                @endif
            </div>
        </div>
    </div>
    <!-- coming soon end -->
@endsection

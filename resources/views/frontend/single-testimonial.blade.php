@extends('frontend.layout.master')

@section('title', 'Review')

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Testimonial</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Testimonial</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog single area -->
    <div class="blog-single-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrapper">
                        <div class="blog-single-content">
                            <div class="blog-thumb-img">
                                <img src="{{ asset('storage/' . $review->image) }}" alt="thumb">
                            </div>
                            <div class="blog-info">
                                <div class="blog-details">
                                    <h3 class="blog-details-title mb-20">Our honourable customer's comment</h3>
                                    {{ $review->comment }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <!-- social share -->
                        <div class="widget social-share">
                            <h5 class="widget-title">Follow Us</h5>
                            <div class="social-share-link">
                                @if ($settings->facebook)
                                    <a href="{{ $settings->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($settings->instagram)
                                    <a href="{{ $settings->instagram }}" target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a>
                                @endif
                                @if ($settings->linkedin)
                                    <a href="{{ $settings->linkedin }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if ($settings->youtube)
                                    <a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog single area end -->
@endsection

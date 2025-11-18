@extends('frontend.layout.master')

@section('title')
    Services
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Services</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Services</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- service-area -->
    <div class="service-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Services</span>
                        <h2 class="site-title">What We <span>Offer</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item">
                            <div class="service-img service-info">
                                <img src="{{ asset('storage/' . $service->service_image) }}"
                                    alt="{{ $service->service_title }}" loading="lazy" title="{{ $service->title }}">
                            </div>
                            <div class="service-icon">
                                {!! $service->service_icon !!}
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">{{ $service->service_title }}</a>
                                </h3>
                                <p class="service-text">
                                    {{ $service->service_text }}
                                </p>
                                <div class="service-arrow">
                                    <a href="{{ route('service.details', $service->service_slug) }}" class="theme-btn">Read
                                        More<i class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-4 mx-auto">
                        <img src="{{ asset('frontend/norecordfound.png') }}" alt="no record">
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- service-area -->
@endsection

@extends('frontend.layout.master')

@section('title')
    {{ $details->service_title }}
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $details->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">{{ $details->service_title }}</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">{{ $details->service_title }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- service-single -->
    <div class="service-single-area py-120">
        <div class="container">
            <div class="service-single-wrapper">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="service-sidebar">
                            <div class="widget category">
                                <h4 class="widget-title">All Services</h4>
                                <div class="category-list">
                                    @forelse ($allServices as $service)
                                        <a href="{{ route('service.details', $service->service_slug) }}"><i
                                                class="far fa-long-arrow-right"></i>{{ $service->service_title }}</a>
                                    @empty
                                        <a href="#"><i class="far fa-long-arrow-right"></i>No Service</a>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="service-details">
                            <div class="service-details-img mb-30">
                                <img src="{{ asset('storage/' . $details->service_image) }}"
                                    alt="{{ $details->service_title }}" title="{{ $details->service_title }}"
                                    loading="lazy">
                            </div>
                            <div class="service-details">
                                <h3 class="mb-30">{{ $details->service_title }}</h3>
                                {!! $details->service_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-single end-->
@endsection

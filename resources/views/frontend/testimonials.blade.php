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


    <!-- testimonial area -->
    <div class="testimonial-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i>
                            {{ $settings->testimonial_subtitle }}</span>
                        <h2 class="site-title">{{ Str::beforeLast($settings->testimonial_title, ' ') }}
                            <span>{{ Str::afterLast($settings->testimonial_title, ' ') }}</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel owl-theme">
                @forelse ($testimonials as $testimonial)
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                    alt="{{ $settings->company_name }} - testimonial">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                {{ $testimonial->comment }}
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @empty
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="{{ asset('frontend/img/testimonial/01.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Sylvia H Green</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have suffered to the
                                alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
@endsection

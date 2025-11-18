@extends('frontend.layout.master')

@section('title')
    About
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title" title="{{ $settings->company_name }} | About">About Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}" title="Go to {{ $settings->company_name }} - homepage">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- about area -->
    <div class="about-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <img src="{{ asset('storage/' . $settings->about_image) }}"
                                alt="{{ $settings->company_name }} - about" loading="lazy"
                                title="{{ $settings->company_name }}">
                        </div>
                        <div class="about-experience">
                            <div class="about-experience-icon">
                                <i class="flaticon-car"></i>
                            </div>
                            <b>{{ $settings->count_experience }} Years Of Quality Service</b>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline justify-content-start">
                                <i class="flaticon-drive"></i> {{ $settings->about_subtitle }}
                            </span>
                            <h2 class="site-title">
                                {{ Str::beforeLast($settings->about_title, ' ') }}
                                <span>{{ Str::afterLast($settings->about_title, ' ') }}</span>
                            </h2>
                        </div>
                        <p class="about-text">
                            {{ $settings->about_text }}
                        </p>
                        <a href="{{ route('about') }}" class="theme-btn mt-4">{{ $settings->about_btn_text }}<i
                                class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->


    <!-- counter area -->
    <div class="counter-area pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-car-rental"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="{{ $settings->count_cars }}"
                                data-speed="3000">{{ $settings->count_cars }}</span>
                            <h6 class="title">+ Available Cars </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-car-key"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="{{ $settings->count_clients }}"
                                data-speed="3000">{{ $settings->count_clients }}</span>
                            <h6 class="title">+ Happy Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-screwdriver"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="{{ $settings->count_workers }}"
                                data-speed="3000">{{ $settings->count_workers }}</span>
                            <h6 class="title">+ Team Workers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-review"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="{{ $settings->count_experience }}"
                                data-speed="3000">{{ $settings->count_experience }}</span>
                            <h6 class="title">+ Years Of Experience</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->


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


    <!-- team-area -->
    <div class="team-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Team</span>
                        <h2 class="site-title">Meet With Our <span>Team</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="assets/img/team/01.jpg" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Chad Smith</a></h5>
                                <span>HR Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="team-img">
                            <img src="assets/img/team/02.jpg" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Malissa Fie</a></h5>
                                <span>Technician</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="team-img">
                            <img src="assets/img/team/03.jpg" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Arron Rodri</a></h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay="1s">
                        <div class="team-img">
                            <img src="assets/img/team/04.jpg" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Tony Pinto</a></h5>
                                <span>Mechanical Engineer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team-area end -->


    <!-- car brand -->
    <div class="car-brand py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i>
                            {{ $settings->brand_subtitle }}</span>
                        <h2 class="site-title">{{ Str::beforeLast($settings->brand_title, ' ') }}
                            <span>{{ Str::afterLast($settings->brand_title, ' ') }}</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($brands as $brand)
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp"
                            data-wow-delay="{{ $loop->iteration * 0.25 }}s">
                            <div class="brand-img">
                                <img src="{{ asset('storage/' . $brand->brand_logo) }}" alt="{{ $brand->brand_title }}"
                                    title="{{ $brand->brand_title }}" loading="lazy">
                            </div>
                            <h5>{{ $brand->brand_title }}</h5>
                        </a>
                    </div>
                @empty
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="brand-img">
                                <img src="{{ asset('frontend/img/brand/01.png') }}" alt="">
                            </div>
                            <h5>Ferrari</h5>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- car brand end-->
@endsection

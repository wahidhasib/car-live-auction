@extends('frontend.layout.master')

@section('title')
    Home
@endsection

@section('content')
    <!-- hero slider -->
    <div class="hero-section">
        <div class="hero-slider owl-carousel owl-theme">
            @forelse ($carousels as $carousel)
                <div class="hero-single" style="background: url({{ asset('storage/' . $carousel->carousel_background) }})">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                                        {{ $carousel->carousel_subtitle }}
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        {{ Str::beforeLast($carousel->carousel_title, ' ') }}
                                        <span>{{ Str::afterLast($carousel->carousel_title, ' ') }}</span>
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        {{ $carousel->carousel_text }}
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a title="Go to {{ $settings->company_name }} - About" href="{{ route('about') }}"
                                            class="theme-btn">About More<i class="fas fa-arrow-right-long"></i></a>
                                        {{-- <a href="{{ route('about') }}" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right-long"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="hero-right">
                                    <div class="hero-img">
                                        <img src="{{ asset('storage/' . $carousel->carousel_image) }}"
                                            alt="{{ $carousel->carousel_title }}" data-animation="fadeInRight"
                                            title="{{ $carousel->carousel_title }}" loading="lazy" data-delay=".25s">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="hero-single" style="background: url({{ asset('frontend/img/slider/slider-1.jpg') }})">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                        Motex!
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Best Way To Find Your <span>Dream</span> Car
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        There are many variations of passages orem psum available but the majority have
                                        suffered alteration in some form by injected humour.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="#" class="theme-btn">About More<i
                                                class="fas fa-arrow-right-long"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="hero-right">
                                    <div class="hero-img">
                                        <img src="{{ asset('frontend/img/slider/hero-1.png') }}" alt=""
                                            data-animation="fadeInRight" data-delay=".25s">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- hero slider end -->


    <!-- find car form -->
    <div class="find-car">
        <div class="container">
            <div class="find-car-form">
                <h4 class="find-car-title">Let's Find Your Perfect Car</h4>
                <form action="{{ route('search.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Car Condition</label>
                                <select class="select @error('condition') is-invalid @enderror" name="condition">
                                    <option value="">All Status</option>
                                    <option value="1">Brand New</option>
                                    <option value="2">Re-Condition</option>
                                </select>
                                @error('condition')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select class="select @error('brand_id') is-invalid @enderror" name="brand_id">
                                    <option value="">All Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Choose Year</label>
                                <select class="select @error('year') is-invalid @enderror" name="year">
                                    <option value="">All Year</option>
                                    <option>2023</option>
                                    <option>2022</option>
                                    <option>2021</option>
                                    <option>2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Body Type</label>
                                <select class="select @error('body_type') is-invalid @enderror" name="body_type">
                                    <option value="">All Body Type</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('body_type')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 align-self-end mt-3">
                            <button class="theme-btn" type="submit"><span class="far fa-search"></span> Find
                                Your
                                Car</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- findcar form end -->


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


    <!-- car area -->
    <div class="car-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i>
                            {{ $settings->latest_car_subtitle }}</span>
                        <h2 class="site-title">{{ Str::beforeLast($settings->latest_car_title, ' ') }}
                            <span>{{ Str::afterLast($settings->latest_car_title, ' ') }}</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row" id="car-records">
                @if ($cars->count() > 0)
                    @php
                        $conditions = [
                            1 => ['label' => 'Brand New', 'class' => '1'],
                            2 => ['label' => 'Re-Condition', 'class' => '2'],
                            3 => ['label' => 'Used', 'class' => '3'],
                        ];
                    @endphp
                    @foreach ($cars as $index => $car)
                        <div class="col-sm-6 col-lg-4 col-xl-3 car-list-item">
                            <div class="car-item wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                                <div class="car-img">
                                    <span
                                        class="car-status status-{{ $conditions[$car->condition]['class'] }}">{{ $conditions[$car->condition]['label'] }}</span>
                                    @php
                                        $imagePath = $car->images->first()->image_path ?? null;
                                    @endphp
                                    @if ($imagePath && file_exists(public_path('storage/' . $imagePath)))
                                        <img class="primary-img" src="{{ asset('storage/' . $imagePath) }}"
                                            alt="{{ $car->name }}">
                                    @else
                                        <img class="primary-img" src="{{ asset('frontend/img/car/01.jpg') }}"
                                            alt="">
                                    @endif
                                    <div class="car-btns">
                                        <a class="add-to-wishlist" data-id="{{ $car->id }}"
                                            data-image="{{ $imagePath }}" data-name="{{ $car->name }}"
                                            data-brand="{{ $car->brand->brand_title }}"
                                            data-slug="{{ route('car.details', $car->slug) }}"
                                            data-category="{{ $car->category->category_name }}"><i
                                                class="far fa-heart"></i></a>
                                        <a class="add-to-compare" data-id="{{ $car->id }}">
                                            <i class="far fa-arrows-repeat"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="car-content">
                                    <div class="car-top">
                                        <h4><a href="#">{{ $car->name }}</a></h4>
                                        <div class="car-rate">
                                            @for ($i = 0; $i < $car->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            <span>({{ $car->rating }})</span>
                                        </div>
                                    </div>
                                    <ul class="car-list">
                                        <li><i class="far fa-steering-wheel"></i>{{ $car->transmission }}</li>
                                        <li><i class="far fa-road"></i>{{ $car->milage }}</li>
                                        <li><i class="far fa-car"></i>Model: {{ $car->year }}</li>
                                        <li><i class="far fa-gas-pump"></i>{{ $car->category->category_name }}</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">৳ {{ $car->price }}</span>
                                        <a href="{{ route('car.details', $car->slug) }}" class="theme-btn"><span
                                                class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center mt-4">
                <a class="theme-btn" id="load-more">Load More <i class="far fa-arrow-rotate-right"></i> </a>
            </div>
        </div>
    </div>
    <!-- car area end -->


    <!-- car category -->
    <div class="car-category py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i>
                            {{ $settings->category_subtitle }}</span>
                        <h2 class="site-title">{{ Str::beforeLast($settings->category_title, ' ') }}
                            <span>{{ Str::afterLast($settings->category_title, ' ') }}</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp"
                            data-wow-delay="{{ $loop->iteration * 0.25 }}s">
                            <div class="category-img">
                                <img src="{{ asset('storage/' . $category->category_image) }}"
                                    alt="{{ $category->category_name }}" title="{{ $category->category_name }}"
                                    loading="lazy">
                            </div>
                            <h5>{{ $category->category_name }}</h5>
                        </a>
                    </div>
                @empty
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="category-img">
                                <img src="{{ asset('frontend/img/category/01.png') }}" alt="">
                            </div>
                            <h5>Sedan</h5>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- car category end-->


    <!-- video area -->
    <div class="video-area pb-120">
        <div class="container-fluid px-0">
            <div class="video-content"
                style="background-image: url({{ asset('storage/' . $settings->banner_background) }});"
                title="watch on youtube {{ $settings->company_name }}">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="video-wrapper">
                            <a class="play-btn popup-youtube" href="{{ $settings->video_link }}">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->

    <!-- choose area -->
    <div class="choose-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="choose-content">
                        <div class="site-heading wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline text-white justify-content-start">
                                <i class="flaticon-drive"></i> {{ $settings->service_subtitle }}
                            </span>
                            <h2 class="site-title text-white mb-10">
                                {{ Str::beforeLast($settings->service_title, ' ') }}
                                <span>{{ Str::afterLast($settings->service_title, ' ') }}</span>
                            </h2>
                            <p class="text-white">
                                {{ $settings->service_text }}
                            </p>
                        </div>
                        <div class="choose-img wow fadeInUp" data-wow-delay=".25s">
                            <img src="{{ asset('storage/' . $settings->service_image) }}" alt="service image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-content-wrapper wow fadeInRight" data-wow-delay=".25s">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 mt-lg-5">
                                <div class="choose-item">
                                    <span class="choose-count">01</span>
                                    <div class="choose-item-icon">
                                        <i class="flaticon-car"></i>
                                    </div>
                                    <div class="choose-item-info">
                                        <h3>{{ $settings->service_quality_title }}</h3>
                                        <p>{{ $settings->service_quality_text }}</p>
                                    </div>
                                </div>
                                <div class="choose-item mb-lg-0">
                                    <span class="choose-count">03</span>
                                    <div class="choose-item-icon">
                                        <i class="flaticon-drive-thru"></i>
                                    </div>
                                    <div class="choose-item-info">
                                        <h3>{{ $settings->service_mechanic_title }}</h3>
                                        <p>{{ $settings->service_mechanic_text }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="choose-item">
                                    <span class="choose-count">02</span>
                                    <div class="choose-item-icon">
                                        <i class="flaticon-chauffeur"></i>
                                    </div>
                                    <div class="choose-item-info">
                                        <h3>{{ $settings->service_brand_title }}</h3>
                                        <p>{{ $settings->service_brand_text }}</p>
                                    </div>
                                </div>
                                <div class="choose-item mb-lg-0">
                                    <span class="choose-count">04</span>
                                    <div class="choose-item-icon">
                                        <i class="flaticon-online-payment"></i>
                                    </div>
                                    <div class="choose-item-info">
                                        <h3>{{ $settings->service_price_title }}</h3>
                                        <p>{{ $settings->service_price_text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose area end -->


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


    <!-- blog area -->
    <div class="blog-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i>
                            {{ $settings->blog_subtitle }}</span>
                        <h2 class="site-title">{{ Str::beforeLast($settings->blog_title, ' ') }}
                            <span>{{ Str::afterLast($settings->blog_title, ' ') }}</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($latestBlogs) > 0)
                    @foreach ($latestBlogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <img src="{{ asset('storage/' . $blog->blog_image) }}"
                                        alt="{{ $blog->blog_title }}" title="{{ $blog->blog_title }}" loading="lazy">
                                </div>
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li><a href="#"><i class="far fa-user-circle"></i> By
                                                    {{ $blog->author_name }}</a>
                                            </li>
                                            <li><a href="#"><i class="far fa-calendar-alt"></i>
                                                    {{ $blog->created_at->format('M d, Y') }}</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="blog-title">
                                        <a href="#">{{ Str::limit($blog->blog_title, 40, '...') }}</a>
                                    </h4>
                                    <a class="theme-btn" href="#">Read More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- blog area end -->
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $("#load-more").click(function() {
                let offset = $('.car-list-item').length;

                $.ajax({
                    type: "get",
                    url: "{{ route('loadCars') }}",
                    data: {
                        offset: offset
                    },
                    success: function(response) {
                        $("#car-records").append(response.html);

                        if (!response.hasMore) {
                            $("#load-more").hide();
                        }
                    }
                });
            });
        });
    </script>
@endpush

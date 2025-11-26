@extends('frontend.layout.master')

@section('seo')
    <meta name="title" content="{{ $car->meta_title ?? $settings->meta_title }}">
    <meta name="description" content="{{ $car->meta_description ?? $settings->meta_description }}">
    <meta name="keywords" content="{{ $car->meta_keywords ?? $settings->meta_keywords }}">

    <!-- OG -->
    <meta property="og:title" content="{{ $car->meta_title ?? $settings->meta_title }}">
    <meta property="og:description" content="{{ $car->meta_description ?? $settings->meta_description }}">
    <meta property="og:image"
        content="{{ $car->images->first()->image_path ? asset('storage/' . $car->images->first()->image_path) : asset('storage/' . $settings->header_logo) }}">

    <!-- Twitter -->
    <meta name="twitter:title" content="{{ $car->meta_title ?? $settings->meta_title }}">
    <meta name="twitter:description" content="{{ $car->meta_description ?? $settings->meta_description }}">
    <meta name="twitter:image"
        content="{{ $car->images->first()->image_path ? asset('storage/' . $car->images->first()->image_path) : asset('storage/' . $settings->header_logo) }}">
@endsection

@section('title')
    {{ $car->name }}
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title" title="{{ $settings->company_name }} | Car">{{ $car->name }}</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}" title="Go to {{ $settings->company_name }} - homepage">Home</a></li>
                <li class="active">{{ $car->name }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- car single -->
    @php
        $conditions = [
            1 => ['label' => 'New', 'class' => '1'],
            2 => ['label' => 'Pre-owend', 'class' => '2'],
            3 => ['label' => 'Used', 'class' => '3'],
        ];
    @endphp

    <div class="car-item-single bg py-120">
        <div class="container">
            <div class="car-single-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="car-single-details">
                            <div class="car-single-widget">
                                <div class="car-single-top">
                                    <span
                                        class="car-status status-{{ $conditions[$car->condition]['class'] }}">{{ $conditions[$car->condition]['label'] }}</span>
                                    <h3 class="car-single-title">{{ $car->name }}</h3>
                                    <ul class="car-single-meta">
                                        <li><i class="far fa-clock"></i> Listed On:
                                            {{ $car->created_at->format('M d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="car-single-slider">
                                    <div class="item-gallery">
                                        <div class="flexslider-thumbnails">
                                            <ul class="slides">
                                                @if (count($car->images) > 0)
                                                    @foreach ($car->images as $item)
                                                        <li data-thumb="{{ asset('storage/' . $item->image_path) }}">
                                                            <img src="{{ asset('storage/' . $item->image_path) }}"
                                                                alt="#">
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-single-widget">
                                <h4 class="mb-4">Key Information</h4>
                                <div class="car-key-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Body Type</span>
                                                    <h6>{{ $car->category->category_name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Condition</span>
                                                    @php
                                                        $conditions = [
                                                            1 => 'Brand New',
                                                            2 => 'Pre-Owned',
                                                            3 => 'Used',
                                                        ];
                                                    @endphp
                                                    <h6>{{ $conditions[$car->condition] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-speedometer"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Mileage</span>
                                                    <h6>{{ $car->milage }} (km)</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-settings"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Transmission</span>
                                                    <h6>{{ $car->transmission }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Year</span>
                                                    <h6>{{ $car->year }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-gas-station"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Fuel Type</span>
                                                    <h6>{{ $car->fuel_type }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Color</span>
                                                    <h6>{{ $car->color }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Doors</span>
                                                    <h6>{{ $car->doors }} Doors</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Cylinders</span>
                                                    <h6>{{ str_pad($car->cylenders, 2, '0', STR_PAD_LEFT) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Engine Size</span>
                                                    <h6>{{ $car->engine }} (cc)</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>VIN</span>
                                                    <h6>{{ $car->vin_number }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-single-widget">
                                <div class="car-single-overview">
                                    <h4 class="mb-3">Description</h4>
                                    <div class="mb-4">
                                        {!! $car->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="car-single-widget">
                                <div class="car-single-review">
                                    @if (count($car->reviews) > 0)
                                        <div class="blog-comments mb-0">
                                            <h4>Reviews ({{ count($car->reviews) }})</h4>
                                            <div class="blog-comments-wrapper">
                                                @foreach ($car->reviews as $review)
                                                    <div class="blog-comments-single">
                                                        <img src="{{ asset('frontend/img/blog/com-1.jpg') }}"
                                                            alt="thumb">
                                                        <div class="blog-comments-content">
                                                            <h5>{{ $review->user->name }}</h5>
                                                            <span><i class="far fa-clock"></i>
                                                                {{ $review->created_at->format('M d, Y') }}</span>
                                                            <p>{{ $review->comment }}</p>
                                                            {{-- <a href="#"><i class="far fa-reply"></i> Reply</a> --}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="car-single-widget">
                            <h4 class="car-single-price">৳ {{ $car->price }}</h4>
                            <ul class="car-single-meta">
                                <li><i class="fa-regular fa-gauge-high"></i> total running</li>
                            </ul>
                        </div>
                        <div class="car-single-widget">
                            <h5 class="">Rating</h5>
                            <div class="car-single-form">
                                <form action="{{ route('reviews.store') }}" method="POST">
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @csrf
                                    <input name="car_id" type="hidden" value="{{ $car->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group car-review-rating">
                                                <label class="rating-label">Your Rating</label>
                                                <div class="rating-stars">
                                                    <input type="radio" name="rating" id="star5" value="5">
                                                    <label for="star5">★</label>

                                                    <input type="radio" name="rating" id="star4" value="4">
                                                    <label for="star4">★</label>

                                                    <input type="radio" name="rating" id="star3" value="3">
                                                    <label for="star3">★</label>

                                                    <input type="radio" name="rating" id="star2" value="2">
                                                    <label for="star2">★</label>

                                                    <input type="radio" name="rating" id="star1" value="1">
                                                    <label for="star1">★</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" rows="5" placeholder="Your Comment*"></textarea>
                                            </div>
                                            <button type="submit" class="theme-btn mt-2"><span
                                                    class="far fa-paper-plane"></span> Submit Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="car-single-widget">
                            <h5 class="mb-3">Contact Details</h5>
                            <div class="car-single-form">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Write Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn">Send Now<i
                                                class="fas fa-arrow-right-long"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-single-related mt-5">
                    <h3 class="mb-30">Related Listing</h3>
                    <div class="row">
                        @if ($relatedCars->count() > 0)
                            @php
                                $conditions = [
                                    1 => ['label' => 'Brand New', 'class' => '1'],
                                    2 => ['label' => 'Pre-owned', 'class' => '2'],
                                    3 => ['label' => 'Used', 'class' => '3'],
                                ];
                            @endphp
                            @foreach ($relatedCars as $index => $car)
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
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
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
                                                <li><i class="far fa-gas-pump"></i>{{ $car->category->category_name }}
                                                </li>
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
                </div>
            </div>
        </div>
    </div>
    <!-- car single end -->
@endsection

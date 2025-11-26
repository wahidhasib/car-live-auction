@extends('frontend.layout.master')

@section('title')
    Search
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_banner) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Search Car</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Search car</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->



    <!-- car area -->
    <div class="car-area grid bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-12">
                        <div class="car-sort">
                            <h6>Showing results based on your query</h6>
                        </div>
                    </div>
                    <div class="row">
                        @if ($filterCars->count() > 0)
                            @php
                                $conditions = [
                                    1 => ['label' => 'Brand New', 'class' => '1'],
                                    2 => ['label' => 'Pre-owned', 'class' => '2'],
                                    3 => ['label' => 'Used', 'class' => '3'],
                                ];
                            @endphp
                            @foreach ($filterCars as $index => $car)
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
                        @else
                            <div class="col-lg-12">
                                <img src="{{ asset('frontend/norecordfound.png') }}" alt="" width="400px"
                                    class="d-block mx-auto">
                            </div>
                        @endif
                    </div>
                    <!-- pagination -->
                    <div class="pagination-area">
                        <div aria-label="Page navigation example">
                            {{ $filterCars->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </div>
    <!-- car area end -->
@endsection

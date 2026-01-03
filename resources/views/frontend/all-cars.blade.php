@extends('frontend.layout.master')

@section('title', 'Cars')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mt-lg-2">
                <div class="car-sort">
                    <h2 class=" text-2xl">All Cars</h2>
                </div>
            </div>
        </div>
        <div class="row">
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
                                    <img class="primary-img" src="{{ asset('frontend/img/car/01.jpg') }}" alt="">
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
                                    <li><i class="far fa-calendar-alt"></i>Year: {{ $car->year }}</li>
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
            <div class="mx-auto mb-4">
                {{ $cars->onEachSide(1)->links('pagination.custom-pagination') }}
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layout.master')

@section('title')
    Compare
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_banner) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Compare</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Compare</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- compare area -->
    <div class="compare-area py-120">
        <div class="container">
            @if (count($compareCars) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered compare-table">
                        <tbody>
                            <tr>
                                <th></th>
                                @foreach ($compareCars as $car)
                                    <td>
                                        {{-- <img class="compare-img"
                                        src="{{ asset('storage/' . $car->images->first()->image_path) }}"
                                        alt="{{ $car->name }}"> --}}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Title</th>
                                @foreach ($compareCars as $item)
                                    <td>
                                        <h5 class="compare-title">{{ $car->name }}</h5>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Condition</th>
                                @php
                                    $conditions = [
                                        1 => ['label' => 'New', 'class' => 'new'],
                                        2 => ['label' => 'Pre Owned', 'class' => 'used'],
                                        3 => ['label' => 'Used', 'class' => 'bg-danger'],
                                    ];
                                @endphp
                                @foreach ($compareCars as $car)
                                    <td><span
                                            class="badge {{ $conditions[$car->condition]['class'] }}">{{ $conditions[$car->condition]['label'] }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Body Type</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->category->category_name }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Make Brand</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->brand->brand_title }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Build Year</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->year }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Fuel Type</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->fuel_type }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Color</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->color }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Mileage</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->milage }} kmpl</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Price</th>
                                @foreach ($compareCars as $car)
                                    <td><span class="compare-price">৳{{ $car->price }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Review</th>
                                @foreach ($compareCars as $car)
                                    <td>
                                        <div class="compare-rate">
                                            @for ($i = 1; $i <= $car->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            <span>({{ number_format($car->rating, 2) }})</span>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Transmission</th>
                                @foreach ($compareCars as $car)
                                    <td><span>{{ $car->transmission }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Engine Size</th>
                                <td><span>{{ $car->engine }}CC</span></td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                @foreach ($compareCars as $car)
                                    <td><a class="theme-btn compare-btn removeFromCompare" data-id="{{ $car->id }}">
                                            <span class="far fa-circle-xmark"></span>Remove</a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-xl-3 mx-auto">
                        <img src="{{ asset('frontend/img/compare/add-bookmark.png') }}" alt="compare img"
                            class="bookmark-img">
                        <br>
                        <a href="{{ route('home') }}" class="theme-btn">Go Back Home <i class="far fa-home"></i></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- compare area end -->
@endsection

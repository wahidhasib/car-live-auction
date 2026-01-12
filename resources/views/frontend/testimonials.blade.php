@extends('frontend.layout.master')

@section('title')
    Services
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Testimonials</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Testimonials</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- testimonial area -->
    {{-- <div class="testimonial-area bg py-120">
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
                    <a href="{{ route('happyClient', $testimonial->id) }}" class="testimonial-single">
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
                                {{ Str::limit($testimonial->comment, 80, '...') }}
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </a>
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
    </div> --}}

    <div class="container my-3">
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
        <div class="row g-3">
            @forelse ($testimonials as $testimonial)
                <div class="col-6 col-lg-4">
                    <div class="card h-100 border">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center py-2">
                            <h6 class="mb-0 text-dark fw-semibold">
                                {{ $testimonial->name }}
                            </h6>
                            <small class="text-muted">
                                {{ $testimonial->created_at->format('d M Y') }}
                            </small>
                        </div>

                        <div class="card-body p-0">
                            <a href="{{ route('happyClient', $testimonial->id) }}">
                                <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-fluid w-100"
                                    loading="lazy" alt="{{ $settings->company_name }}">
                            </a>
                        </div>

                        <div class="card-footer bg-white py-2">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star text-warning small"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-6 col-lg-3 mx-auto">
                    <img src="{{ asset('frontend/norecordfound.png') }}" loading="lazy" alt="No record found">
                </div>
            @endforelse
        </div>
    </div>
    <!-- testimonial area end -->
@endsection

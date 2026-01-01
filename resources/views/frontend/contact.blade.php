@extends('frontend.layout.master')

@section('title')
    Contact
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Contact Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- contact area -->
    <div class="contact-area py-120">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-map-location-dot"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Address</h5>
                                <p>{{ $settings->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Call Us</h5>
                                <p>{{ $settings->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-envelopes"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Email Us</h5>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-alarm-clock"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Open Time</h5>
                                <p>{{ $settings->working_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="contact-img">
                            <img src="{{ asset('storage/' . $settings->contact_image) }}"
                                alt="{{ $settings->company_name }} | Contact" loading="lazy"
                                title="{{ $settings->company_name }} | Contact">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="contact-form">
                            <div class="contact-form-header">
                                <h2>{{ $settings->form_title }}</h2>
                                <p>{{ $settings->form_text }}</p>
                            </div>
                            <form method="post" action="#" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Your Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Your Subject"
                                        required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Write Your Message"></textarea>
                                </div>
                                <button type="submit" class="theme-btn">Send
                                    Message <i class="far fa-paper-plane"></i></button>
                                <div class="col-md-12 mt-3">
                                    <div class="form-messege text-success"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact area -->

    <!-- map -->
    <div class="contact-map">
        {!! $settings->map_link !!}
    </div>
@endsection

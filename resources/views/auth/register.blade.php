@extends('frontend.layout.master')

@section('title')
    Register
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Register</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- register area -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="{{ asset('storage/' . $settings->header_logo) }}" alt="{{ $settings->company_name }}">
                        <p>Create your account</p>
                    </div>
                    <form action="{{ route('register.action') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                required value="{{ old('name') }}" placeholder="Your Name">
                            @error('name')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                required value="{{ old('email') }}" placeholder="Your Email">
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                placeholder="Your Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required
                                placeholder="Your Password">
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Register</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Already have an account? <a href="{{ route('login') }}">Login.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register area end -->
@endsection

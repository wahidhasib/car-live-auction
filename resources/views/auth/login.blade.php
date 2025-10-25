@extends('frontend.layout.master')

@section('title')
    Login
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('frontend/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Login</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- login area -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="{{ asset('frontend/img/logo/logo.png') }}" alt="">
                        @if (session('authError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('authError') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required placeholder="Your Email">
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" required
                                placeholder="Your Password">
                            @error('password')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="d-flex justify-content-end mb-4">
                            <a href="forgot-password.html" class="forgot-pass">Forgot Password?</a>
                        </div> --}}
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="{{ route('register') }}">Register.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection

@extends('frontend.layout.master')

@section('title', 'Review')

@section('content')
    <div class="container py-5">

        <h1 class="mb-4">Sitemap</h1>

        <h3>Pages</h3>

        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('cars') }}">Cars</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('calculator') }}">EMI Calculator</a></li>
            <li><a href="{{ route('blogsPage') }}">Blogs</a></li>
        </ul>


        <h3 class="mt-4">Cars</h3>

        <ul>
            @foreach ($cars as $car)
                <li>
                    <a href="{{ route('car.details', $car->slug) }}">
                        {{ $car->name ?? ($car->title ?? $car->slug) }}
                    </a>
                </li>
            @endforeach
        </ul>


        <h3 class="mt-4">Services</h3>

        <ul>
            @foreach ($services as $service)
                <li>
                    <a href="{{ route('service.details', $service->service_slug) }}">
                        {{ $service->name ?? ($service->title ?? $service->service_slug) }}
                    </a>
                </li>
            @endforeach
        </ul>


        <h3 class="mt-4">Blog</h3>

        <ul>
            @foreach ($blogs as $blog)
                <li>
                    <a href="{{ route('singleBlog', $blog->blog_slug) }}">
                        {{ $blog->title ?? ($blog->name ?? $blog->blog_slug) }}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection

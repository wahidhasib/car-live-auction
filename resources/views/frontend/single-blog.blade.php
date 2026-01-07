@extends('frontend.layout.master')

@section('title', $blog->blog_title)

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_bg) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Blogs</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Blog</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog single area -->
    <div class="blog-single-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrapper">
                        <div class="blog-single-content">
                            <div class="blog-thumb-img">
                                <img src="{{ $blog->blog_image }}" alt="{{ $blog->blog_title }}">
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="blog-meta-left">
                                        <ul>
                                            <li><i class="far fa-user"></i><a href="#"
                                                    class="text-dark">{{ $blog->author_name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-details">
                                    <h3 class="blog-details-title mb-20">{{ $blog->blog_title }}</h3>
                                    {!! $blog->blog_description !!}
                                </div>
                                <div class="blog-author">
                                    <div class="blog-author-img">
                                        <img src="{{ asset('storage/' . $blog->blog_image) }}"
                                            alt="{{ $blog->blog_title }}">
                                    </div>
                                    <div class="author-info">
                                        <h6>Author</h6>
                                        <h3 class="author-name">{{ $blog->author_name }}</h3>
                                        <div class="author-social">
                                            @if ($blog->facebook)
                                                <a href="{{ $blog->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                            @endif
                                            @if ($blog->instagram)
                                                <a href="{{ $blog->instagram }}"><i class="fab fa-instagram"></i></a>
                                            @endif
                                            @if ($blog->youtube)
                                                <a href="{{ $blog->youtube }}"><i class="fab fa-youtube"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <!-- recent post -->
                        <div class="widget recent-post">
                            <h5 class="widget-title">Recent Post</h5>
                            @forelse ($recentBlogs as $item)
                                <div class="recent-post-single">
                                    <div class="recent-post-img">
                                        <img src="{{ asset('storage/' . $item->blog_image) }}" alt="thumb">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a
                                                href="{{ route('singleBlog', $item->blog_slug) }}">{{ Str::limit($item->blog_title) }}</a>
                                        </h6>
                                        <span><i class="far fa-clock"></i>{{ $item->created_at->format('d-M-Y') }}</span>
                                    </div>
                                </div>
                            @empty
                                <h4>No Blog found</h4>
                            @endforelse
                        </div>
                        <!-- social share -->
                        <div class="widget social-share">
                            <h5 class="widget-title">Follow Us</h5>
                            <div class="social-share-link">
                                @if ($settings->facebook)
                                    <a href="{{ $settings->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($settings->instagram)
                                    <a href="{{ $settings->instagram }}" target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a>
                                @endif
                                @if ($settings->linkedin)
                                    <a href="{{ $settings->linkedin }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if ($settings->youtube)
                                    <a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog single area end -->
@endsection

@extends('frontend.layout.master')

@section('title', 'Blogs')

@section('content')
    <!-- blog area -->
    <div class="blog-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Our Blog</span>
                        <h2 class="site-title">Latest News & <span>Blog</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="{{ asset('storage/' . $blog->blog_image) }}" alt="{{ $blog->blog_title }}">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i>
                                                {{ $blog->author_name }}</a></li>
                                        <li><a href="#"><i class="far fa-calendar-alt"></i>
                                                {{ $blog->created_at->format('d-m-Y') }}</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a
                                        href="{{ route('singleBlog', $blog->blog_slug) }}">{{ Str::limit($blog->blog_title, 50, '...') }}</a>
                                </h4>
                                <a class="theme-btn" href="{{ route('singleBlog', $blog->blog_slug) }}">Read More<i
                                        class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6 mx-auto">
                        <img src="{{ asset('frontend/norecordfound.png') }}" alt="">
                    </div>
                @endforelse
            </div>
            <!-- pagination -->
            <div class="pagination-area">
                {{ $blogs->links() }}
            </div>
            <!-- pagination end -->
        </div>
    </div>
    <!-- blog area end -->
@endsection

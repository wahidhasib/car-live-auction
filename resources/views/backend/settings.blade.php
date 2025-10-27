@extends('backend.layout.master')

@section('title')
    Settings
@endsection

@section('content')
    <form action="{{ route('admin.settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header bg-black">
                <h4 class="text-white">General</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 mt-2">
                        <label for="company_name" class="form-label">Company name</label>
                        <input type="text" value="{{ $settings->company_name }}" name="company_name" id="company_name"
                            class="form-control @error('company_name') is-invalid @enderror">
                        @error('company_name')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="email" class="form-label">Company email</label>
                        <input type="text" value="{{ $settings->email }}" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="phone" class="form-label">Company phone</label>
                        <input type="text" value="{{ $settings->phone }}" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="working_time" class="form-label">Working hours</label>
                        <input type="text" value="{{ $settings->working_time }}" name="working_time" id="working_time"
                            class="form-control @error('working_time') is-invalid @enderror">
                        @error('working_time')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="footer_text" class="form-label">Footer text</label>
                        <textarea name="footer_text" id="footer_text" class="form-control @error('footer_text') is-invalid @enderror">{{ $settings->footer_text }}</textarea>
                        @error('footer_text')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="map_link" class="form-label">Map link</label>
                        <textarea name="map_link" id="map_link" class="form-control @error('map_link') is-invalid @enderror">{{ $settings->map_link }}</textarea>
                        @error('map_link')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="address" class="form-label">Physical address</label>
                        <input type="text" name="address" value="{{ $settings->address }}"
                            class="form-control @error('address') is-invalid @enderror" id="address">
                        @error('address')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="facebook" class="form-label">Facebook link</label>
                        <input type="text" name="facebook" value="{{ $settings->facebook }}"
                            class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                        @error('facebook')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="instagram" class="form-label">instagram link</label>
                        <input type="text" name="instagram" value="{{ $settings->instagram }}"
                            class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                        @error('instagram')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="youtube" class="form-label">youtube link</label>
                        <input type="text" name="youtube" value="{{ $settings->youtube }}"
                            class="form-control @error('youtube') is-invalid @enderror" id="youtube">
                        @error('youtube')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="linkedin" class="form-label">linkedin link</label>
                        <input type="text" name="linkedin" value="{{ $settings->linkedin }}"
                            class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                        @error('linkedin')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="f_newsletter_text" class="form-label">Newsletter text</label>
                        <input type="text" name="f_newsletter_text" value="{{ $settings->f_newsletter_text }}"
                            class="form-control @error('f_newsletter_text') is-invalid @enderror" id="f_newsletter_text">
                        @error('f_newsletter_text')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="header_logo" class="form-label">Header logo</label>
                        <input type="file" name="header_logo"
                            class="form-control @error('header_logo') is-invalid @enderror" id="header_logo">
                        @error('header_logo')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="footer_logo" class="form-label">Footer logo</label>
                        <input type="file" name="footer_logo"
                            class="form-control @error('footer_logo') is-invalid @enderror" id="footer_logo">
                        @error('footer_logo')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="fav_icon" class="form-label">Fav icon</label>
                        <input type="file" name="fav_icon"
                            class="form-control @error('fav_icon') is-invalid @enderror" id="fav_icon">
                        @error('fav_icon')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mt-2">
                        <label for="common_bg" class="form-label">Common banner</label>
                        <input type="file" name="common_bg"
                            class="form-control @error('common_bg') is-invalid @enderror" id="common_bg">
                        @error('common_bg')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- seo --}}

        <div class="card">
            <div class="card-header bg-black">
                <h4 class="text-white">SEO</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mt-2 col-sm-6">
                        <label class="form-label" for="meta_title">Meta title</label>
                        <input type="text" value="{{ $settings->meta_title }}"
                            class="form-control @error('meta_title') @enderror" id="meta_title" name="meta_title">
                        @error('meta_title')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 col-sm-6">
                        <label class="form-label" for="meta_keywords">Meta keywords</label>
                        <input type="text" value="{{ $settings->meta_keywords }}"
                            class="form-control @error('meta_keywords') @enderror" id="meta_keywords"
                            name="meta_keywords">
                        @error('meta_keywords')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 col-sm-6">
                        <label class="form-label" for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description"
                            class="form-control @error('meta_description') is-invalid @enderror">{{ $settings->meta_description }}</textarea>
                        @error('meta_description')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- About --}}
        <div class="card">
            <div class="card-header bg-black">
                <h4 class="text-white">About</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 mt-2">
                        <label for="about_subtitle" class="form-label">About subtitle</label>
                        <input type="text" value="{{ $settings->about_subtitle }}" name="about_subtitle"
                            id="about_subtitle" class="form-control @error('about_subtitle') is-invalid @enderror">
                        @error('about_subtitle')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-4 mt-2">
                        <label for="about_title" class="form-label">About title</label>
                        <input type="text" value="{{ $settings->about_title }}" name="about_title" id="about_title"
                            class="form-control @error('about_title') is-invalid @enderror">
                        @error('about_title')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-4 mt-2">
                        <label for="about_btn_text" class="form-label">Button text</label>
                        <input type="text" value="{{ $settings->about_btn_text }}" name="about_btn_text"
                            id="about_btn_text" class="form-control @error('about_btn_text') is-invalid @enderror">
                        @error('about_btn_text')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mt-2">
                        <label for="about_message" class="form-label">Float message</label>
                        <input type="text" value="{{ $settings->about_message }}" name="about_message"
                            id="about_message" class="form-control @error('about_message') is-invalid @enderror">
                        @error('about_message')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mt-2">
                        <label for="about_image" class="form-label">Image</label>
                        <input type="file" name="about_image" id="about_image"
                            class="form-control @error('about_image') is-invalid @enderror">
                        @error('about_image')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 mt-2">
                        <label for="about_text" class="form-label">About text</label>
                        <textarea name="about_text" id="about_text" class="form-control @error('about_text') is-invalid @enderror">{{ $settings->about_text }}</textarea>
                        @error('about_text')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- counter section --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Counter</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="count_cars">Number of cars</label>
                                <input type="text" value="{{ $settings->count_cars }}" id="count_cars"
                                    name="count_cars" class="form-control @error('count_cars') is-invalid @enderror">
                                @error('count_cars')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="count_clients">Number of clients</label>
                                <input type="text" value="{{ $settings->count_clients }}" id="count_clients"
                                    name="count_clients"
                                    class="form-control @error('count_clients') is-invalid @enderror">
                                @error('count_clients')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="count_workers">Number of workers</label>
                                <input type="text" value="{{ $settings->count_workers }}" id="count_workers"
                                    name="count_workers"
                                    class="form-control @error('count_workers') is-invalid @enderror">
                                @error('count_workers')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="count_experience">Number of experiences</label>
                                <input type="text" value="{{ $settings->count_experience }}" id="count_experience"
                                    name="count_experience"
                                    class="form-control @error('count_experience') is-invalid @enderror">
                                @error('count_experience')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- latest cars --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Latest cars</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="latest_car_subtitle">Subtitle</label>
                                <input type="text" value="{{ $settings->latest_car_subtitle }}"
                                    id="latest_car_subtitle" name="latest_car_subtitle"
                                    class="form-control @error('latest_car_subtitle') is-invalid @enderror">
                                @error('latest_car_subtitle')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="latest_car_title">Title</label>
                                <input type="text" value="{{ $settings->latest_car_title }}" id="latest_car_title"
                                    name="latest_car_title"
                                    class="form-control @error('latest_car_title') is-invalid @enderror">
                                @error('latest_car_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Category --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="category_subtitle">Subtitle</label>
                                <input type="text" value="{{ $settings->category_subtitle }}" id="category_subtitle"
                                    name="category_subtitle"
                                    class="form-control @error('category_subtitle') is-invalid @enderror">
                                @error('category_subtitle')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="category_title">Title</label>
                                <input type="text" value="{{ $settings->category_title }}" id="category_title"
                                    name="category_title"
                                    class="form-control @error('category_title') is-invalid @enderror">
                                @error('category_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- banner --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Banner</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="video_link">Video link</label>
                                <input type="text" value="{{ $settings->video_link }}" id="video_link"
                                    name="video_link" placeholder="https://www.youtube.com/watch?v=abcd1234"
                                    class="form-control @error('video_link') is-invalid @enderror">
                                @error('video_link')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label class="form-label" for="banner_background">Banner background</label>
                                <input type="file" name="banner_background" id="banner_background"
                                    class="form-control @error('banner_background') is-invalid @enderror">
                                @error('banner_background')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- service --}}
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Services</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- left side --}}
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 mt-2">
                                        <label for="service_subtitle" class="form-label">Subtitle</label>
                                        <input type="text" value="{{ $settings->service_subtitle }}"
                                            id="service_subtitle" name="service_subtitle"
                                            class="form-control @error('service_subtitle') is-invalid @enderror">
                                        @error('service_subtitle')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label for="service_title" class="form-label">Title</label>
                                        <input type="text" value="{{ $settings->service_title }}" id="service_title"
                                            name="service_title"
                                            class="form-control @error('service_title') is-invalid @enderror">
                                        @error('service_title')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <label for="service_text" class="form-label">Service text</label>
                                        <textarea name="service_text" id="service_text" class="form-control @error('service_text') is-invalid @enderror">{{ $settings->service_text }}</textarea>
                                        @error('service_text')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <label for="service_image" class="form-label">Section Image</label>
                                        <input type="file" name="service_image" id="service_image"
                                            class="form-control @error('service_image') @enderror">
                                        @error('service_image')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- right side --}}
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_quality_title">Quality title</label>
                                        <input type="text" value="{{ $settings->service_quality_title }}"
                                            name="service_quality_title" id="service_quality_title"
                                            class="form-control @error('service_quality_title') is-invalid @enderror">
                                        @error('service_quality_title')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_quality_text">Quality text</label>
                                        <input type="text" value="{{ $settings->service_quality_text }}"
                                            name="service_quality_text" id="service_quality_text"
                                            class="form-control @error('service_quality_text') is-invalid @enderror">
                                        @error('service_quality_text')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_mechanic_title">Mechanic title</label>
                                        <input type="text" value="{{ $settings->service_mechanic_title }}"
                                            name="service_mechanic_title" id="service_mechanic_title"
                                            class="form-control @error('service_mechanic_title') is-invalid @enderror">
                                        @error('service_mechanic_title')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_mechanic_text">Mechanic text</label>
                                        <input type="text" value="{{ $settings->service_mechanic_text }}"
                                            name="service_mechanic_text" id="service_mechanic_text"
                                            class="form-control @error('service_mechanic_text') is-invalid @enderror">
                                        @error('service_mechanic_text')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_brand_title">Brand title</label>
                                        <input type="text" value="{{ $settings->service_brand_title }}"
                                            name="service_brand_title" id="service_brand_title"
                                            class="form-control @error('service_brand_title') is-invalid @enderror">
                                        @error('service_brand_title')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_brand_text">Brand text</label>
                                        <input type="text" value="{{ $settings->service_brand_text }}"
                                            name="service_brand_text" id="service_brand_text"
                                            class="form-control @error('service_brand_text') is-invalid @enderror">
                                        @error('service_brand_text')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_price_title">Service title</label>
                                        <input type="text" value="{{ $settings->service_price_title }}"
                                            name="service_price_title" id="service_price_title"
                                            class="form-control @error('service_price_title') is-invalid @enderror">
                                        @error('service_price_title')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="form-label" for="service_price_text">Service text</label>
                                        <input type="text" value="{{ $settings->service_price_text }}"
                                            name="service_price_text" id="service_price_text"
                                            class="form-control @error('service_price_text') is-invalid @enderror">
                                        @error('service_price_text')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label for="testimonial_subtitle" class="form-label">Subtitle</label>
                                <input type="text" value="{{ $settings->testimonial_subtitle }}"
                                    name="testimonial_subtitle" id="testimonial_subtitle"
                                    class="form-control @error('testimonial_subtitle') is-invalid @enderror">
                                @error('testimonial_subtitle')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label for="testimonial_title" class="form-label">Title</label>
                                <input type="text" value="{{ $settings->testimonial_title }}"
                                    name="testimonial_title" id="testimonial_title"
                                    class="form-control @error('testimonial_title') is-invalid @enderror">
                                @error('testimonial_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- brands --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Brands</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label for="brand_subtitle" class="form-label">Subtitle</label>
                                <input type="text" value="{{ $settings->brand_subtitle }}" name="brand_subtitle"
                                    id="brand_subtitle"
                                    class="form-control @error('brand_subtitle') is-invalid @enderror">
                                @error('brand_subtitle')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label for="brand_title" class="form-label">Title</label>
                                <input type="text" value="{{ $settings->brand_title }}" name="brand_title"
                                    id="brand_title" class="form-control @error('brand_title') is-invalid @enderror">
                                @error('brand_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- contact --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Contact</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label for="form_title" class="form-label">Title</label>
                                <input type="text" value="{{ $settings->form_title }}" name="form_title"
                                    id="form_title" class="form-control @error('form_title') is-invalid @enderror">
                                @error('form_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label for="contact_image" class="form-label">Conact Image</label>
                                <input type="file" name="contact_image" id="contact_image"
                                    class="form-control @error('contact_image') is-invalid @enderror">
                                @error('contact_image')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="form_text" class="form-label">Form Text</label>
                                <textarea name="form_text" id="form_text" class="form-control @error('form_text') is-invalid @enderror">{{ $settings->form_text }}</textarea>
                                @error('form_text')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- blog --}}
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h4 class="text-white">Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mt-2">
                                <label for="blog_subtitle" class="form-label">Subtitle</label>
                                <input type="text" value="{{ $settings->blog_subtitle }}" name="blog_subtitle"
                                    id="blog_subtitle" class="form-control @error('blog_subtitle') is-invalid @enderror">
                                @error('blog_subtitle')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label for="blog_title" class="form-label">Title</label>
                                <input type="text" value="{{ $settings->blog_title }}" name="blog_title"
                                    id="blog_title" class="form-control @error('blog_title') is-invalid @enderror">
                                @error('blog_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection

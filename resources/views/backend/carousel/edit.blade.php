@extends('backend.layout.master')

@section('title')
    Edit Carousel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Edit Carousel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.carousel.update', $carousel->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="carousel_subtitle" class="form-label">Sub Title</label>
                            <input type="text" placeholder="Sub title"
                                class="form-control @error('carousel_subtitle') is-invalid @enderror" id="carousel_subtitle"
                                name="carousel_subtitle" value="{{ $carousel->carousel_title }}" required>
                            @error('carousel_subtitle')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_title" class="form-label">Title</label>
                            <input type="text" placeholder="Title..."
                                class="form-control @error('carousel_title') is-invalid @enderror" id="carousel_title"
                                name="carousel_title" value="{{ $carousel->carousel_subtitle }}" required>
                            @error('carousel_title')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_text" class="form-label">Text</label>
                            <textarea name="carousel_text" id="carousel_text" class="form-control @error('carousel_text') is-invalid @enderror">{{ $carousel->carousel_text }}</textarea>
                            @error('carousel_text')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_image" class="form-label">Main Image</label>
                            <input type="file" name="carousel_image" id="carousel_image"
                                class="form-control @error('carousel_image') is-invalid @enderror" name="carousel_image">
                            @error('carousel_image')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_background" class="form-label">Background Image</label>
                            <input type="file" name="carousel_background" id="carousel_background"
                                class="form-control @error('carousel_background') is-invalid @enderror"
                                name="carousel_background">
                            @error('carousel_background')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_status" class="form-label">Status</label>
                            <select name="carousel_status" id="carousel_status"
                                class="form-control @error('carousel_status') is-invalid @enderror" required>
                                <option {{ $carousel->carousel_status == 1 ? 'selected' : '' }} value="1">Published
                                </option>
                                <option {{ $carousel->carousel_status == 2 ? 'selected' : '' }} value="2">Draft
                                </option>
                            </select>
                            @error('carousel_status')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

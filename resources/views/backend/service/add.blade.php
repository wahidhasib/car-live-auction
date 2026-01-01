@extends('backend.layout.master')

@section('title')
    Add Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group mt-2 col-sm-6">
                                <label for="service_title" class="form-label fw-bold">Service Title</label>
                                <input type="text" value="{{ old('service_title') }}" placeholder="Service Title..."
                                    id="service_title" class="form-control @error('service_title') is-invalid @enderror"
                                    name="service_title" required>
                                @error('service_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">
                                <label for="service_image" class="form-label fw-bold">Service Image</label>
                                <input type="file" id="service_image"
                                    class="form-control @error('service_image') is-invalid @enderror" name="service_image"
                                    required>
                                @error('service_image')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">
                                <label for="service_icon" class="form-label fw-bold">Service icon</label>
                                <input type="text" value="{{ old('service_icon') }}" placeholder="" id="service_icon"
                                    class="form-control @error('service_icon') is-invalid @enderror" name="service_icon"
                                    required>
                                @error('service_icon')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">
                                <label for="service_text" class="form-label fw-bold">Service Text</label>
                                <input type="text" placeholder="Service short text..." value="{{ old('service_text') }}"
                                    class="form-control @error('service_text') is-invalid @enderror" id="service_text"
                                    name="service_text" required>
                                @error('service_text')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-12">
                                <label for="service_description" class="form-label fw-bold">Service Description</label>
                                <textarea name="service_description" id="service_description" placeholder="Service full description"
                                    class="form-control @error('service_description') is-invalid @enderror">{{ old('service_description') }}</textarea>
                                @error('service_description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">
                                <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                                <input type="text" value="{{ old('meta_title') }}" placeholder="Meta title for SEO..."
                                    id="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                                    name="meta_title" required>
                                @error('meta_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror

                                <label for="meta_keywords" class="form-label fw-bold mt-1">Meta Keywords</label>
                                <input type="text" placeholder="Meta keywords for SEO"
                                    value="{{ old('meta_keywords') }}"
                                    class="form-control @error('meta_tilte') is-invalid @enderror" id="meta_keywords"
                                    name="meta_keywords" required>
                                @error('meta_keywords')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">
                                <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" placeholder="Meta description for SEO"
                                    class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2 col-sm-6">

                            </div>
                        </div>
                        <div class="form-group mt-2 col-sm-6">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('service_description', {
            removePlugins: 'exportpdf'
        });
    </script>
@endpush

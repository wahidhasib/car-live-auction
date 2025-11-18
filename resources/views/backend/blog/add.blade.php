@extends('backend.layout.master')

@section('title')
    Add Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group mt-2 col-sm-6">
                        <label for="blog_title" class="form-label fw-bold">Blog Title</label>
                        <input type="text" value="{{ old('blog_title') }}" placeholder="Title..." id="blog_title"
                            class="form-control @error('blog_title') is-invalid @enderror" name="blog_title" required>
                        @error('blog_title')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="blog_image" class="form-label fw-bold">Blog Image</label>
                        <input type="file" id="blog_image" class="form-control @error('blog_image') is-invalid @enderror"
                            name="blog_image" required>
                        @error('blog_image')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-12">
                        <label for="blog_description" class="form-label fw-bold">Blog Description</label>
                        <textarea name="blog_description" id="blog_description"
                            class="form-control @error('blog_description') is-invalid @enderror">{{ old('blog_description') }}</textarea>
                        @error('blog_description')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="author_name" class="form-label fw-bold">Author Name</label>
                        <input type="text" value="{{ old('author_name') }}" placeholder="Author name..." id="author_name"
                            class="form-control @error('author_name') is-invalid @enderror" name="author_name" required>
                        @error('author_name')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="designation" class="form-label fw-bold">Author Designation</label>
                        <input type="text" value="{{ old('designation') }}" placeholder="Designation..." id="designation"
                            class="form-control @error('designation') is-invalid @enderror" name="designation" required>
                        @error('designation')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="facebook" class="form-label fw-bold">Facebook</label>
                        <input type="text" value="{{ old('facebook') }}" placeholder="Facebook link..." id="facebook"
                            class="form-control @error('facebook') is-invalid @enderror" name="facebook" required>
                        @error('facebook')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="instagram" class="form-label fw-bold">Instagram</label>
                        <input type="text" value="{{ old('instagram') }}" placeholder="Instagram link..." id="instagram"
                            class="form-control @error('instagram') is-invalid @enderror" name="instagram" required>
                        @error('instagram')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="youtube" class="form-label fw-bold">Youtube</label>
                        <input type="text" value="{{ old('youtube') }}" placeholder="youtube link..." id="youtube"
                            class="form-control @error('youtube') is-invalid @enderror" name="youtube" required>
                        @error('youtube')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-sm-6">
                        <label for="whatsapp" class="form-label fw-bold">Whatsapp number</label>
                        <input type="text" value="{{ old('whatsapp') }}" placeholder="whatsapp number..." id="whatsapp"
                            class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" required>
                        @error('whatsapp')
                            <div class="mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2 col-sm-6">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('blog_description', {
            removePlugins: 'exportpdf'
        });
    </script>
@endpush

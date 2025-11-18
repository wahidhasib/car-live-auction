@extends('backend.layout.master')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" placeholder="Sports..." value="{{ $category->category_name }}"
                                class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                name="category_name" required>
                            @error('category_name')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="category_slug" class="form-label">Category Slug</label>
                            <input type="text" placeholder="sports" value="{{ $category->category_slug }}"
                                class="form-control @error('category_slug') is-invalid @enderror" id="category_slug"
                                name="category_slug" required>
                            @error('category_slug')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="category_image" class="form-label">Category Image</label>
                            <input type="file" name="category_image" id="category_image"
                                class="form-control @error('category_image') is-invalid @enderror" name="category_image">
                            @error('category_image')
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

@push('script')
    <script>
        $(document).ready(function() {
            // making perfect slug
            $("#category_slug").on('keyup', function() {
                let slug = $(this).val().toLowerCase()
                    .replace(/[\s_]+/g, '-')
                    .replace(/[^a-z0-9-]/g, '')
                    .replace(/-+/g, '-')
                    .replace(/^-+|-+$/g, '-');

                $("#category_slug").val(slug);
            });
        });
    </script>
@endpush

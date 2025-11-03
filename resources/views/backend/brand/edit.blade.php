@extends('backend.layout.master')

@section('title')
    Edit Brand
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Add Carousel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="brand_title" class="form-label">Brand Title</label>
                            <input type="text" placeholder="Brand name..." value="{{ $brand->brand_title }}"
                                class="form-control @error('brand_title') is-invalid @enderror" id="brand_title"
                                name="brand_title" required>
                            @error('brand_title')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand_logo" class="form-label">Brand Logo</label>
                            <input type="file" name="brand_logo" id="brand_logo"
                                class="form-control @error('brand_logo') is-invalid @enderror" name="brand_logo">
                            @error('brand_logo')
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

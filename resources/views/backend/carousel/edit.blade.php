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
                            <label for="carousel_image" class="form-label">Main Image</label>
                            <input type="file" name="carousel_image" id="carousel_image"
                                class="form-control @error('carousel_image') is-invalid @enderror" name="carousel_image">
                            @error('carousel_image')
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

@extends('backend.layout.master')

@section('title')
    Edit Review
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Edit Testimonial</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="John Doe..." value="{{ $testimonial->name }}"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                required>
                            @error('name')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="designation" class="form-label">Designation</label>
                            <select name="designation" id="designation"
                                class="form-control @error('designation') is-invalid @enderror">
                                <option {{ $testimonial->designation == 1 ? 'selected' : '' }} value="customer">Customer
                                </option>
                                <option {{ $testimonial->designation == 2 ? 'selected' : '' }} value="authority">Authority
                                </option>
                            </select>
                            @error('designation')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" id="rating"
                                class="form-control @error('rating') is-invalid @enderror">
                                <option {{ $testimonial->rating == 1 ? 'selected' : '' }} value="1">1</option>
                                <option {{ $testimonial->rating == 2 ? 'selected' : '' }} value="2">2</option>
                                <option {{ $testimonial->rating == 3 ? 'selected' : '' }} value="3">3</option>
                                <option {{ $testimonial->rating == 4 ? 'selected' : '' }} value="4">4</option>
                                <option {{ $testimonial->rating == 5 ? 'selected' : '' }} value="5">5</option>
                            </select>
                            @error('rating')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">{{ $testimonial->comment }}</textarea>
                            @error('comment')
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

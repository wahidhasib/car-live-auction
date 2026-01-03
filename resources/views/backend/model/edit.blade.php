@extends('backend.layout.master')

@section('title', 'Edit Model')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Edit Model</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.model.update', $model->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="title" class="form-label">Model Title</label>
                            <input type="text" placeholder="Model name..." value="{{ $model->title }}"
                                class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                required>
                            @error('title')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand_id" class="form-label">Model brand_id</label>
                            <select name="brand_id" id="brand_id"
                                class="form-select @error('brand_id') is-invalid @enderror">
                                <option selected disabled value="">Select a Brand</option>
                                @forelse ($brands as $brand)
                                    <option {{ $model->brand_id == $brand->id ? 'selected' : '' }}
                                        value="{{ $brand->id }}">
                                        {{ $brand->brand_title }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('brand_id')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Update Model</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

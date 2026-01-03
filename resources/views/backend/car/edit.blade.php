@extends('backend.layout.master')

@section('title')
    Edit Car
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Edit car</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.car.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- Car Name --}}
                            <div class="mt-2 col-lg-6">
                                <label for="name" class="form-label">Car Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $car->name }}" required>
                                @error('name')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Brand --}}
                            <div class="mt-2 col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-select" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $car->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->brand_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="model_id" class="form-label">Model</label>
                                        <select name="model_id" id="model_id"
                                            class="form-select @error('model_id') is-invalid @enderror">
                                            @forelse ($carModels as $model)
                                                <option value="{{ $model->id }}"
                                                    {{ $model->id == $car->model_id ? 'selected' : '' }}>{{ $model->title }}
                                                </option>
                                            @empty
                                                <option value="">Select brand first</option>
                                            @endforelse
                                        </select>
                                        @error('model_id')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Rating --}}
                            <div class="mt-2 col-lg-6">
                                <label for="rating" class="form-label">Rating (1-5)</label>
                                <select name="rating" id="rating" class="form-select">
                                    <option value="1" {{ $car->rating == 1 ? 'selected' : '' }}>1 Star</option>
                                    <option value="2" {{ $car->rating == 2 ? 'selected' : '' }}>2 Star</option>
                                    <option value="3" {{ $car->rating == 3 ? 'selected' : '' }}>3 Star</option>
                                    <option value="4" {{ $car->rating == 4 ? 'selected' : '' }}>4 Star</option>
                                    <option value="5" {{ $car->rating == 5 ? 'selected' : '' }}>5 Star</option>
                                </select>
                                @error('rating')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Body Type --}}
                            <div class="mt-2 col-lg-6">
                                <label for="body_type" class="form-label">Body Type</label>
                                <select name="body_type" id="body_type" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $car->body_type == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('body_type')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Condition --}}
                            <div class="mt-2 col-lg-6">
                                <label for="condition" class="form-label">Car Condition</label>
                                <select name="condition" id="condition" class="form-control">
                                    <option value="1" {{ $car->condition == 1 ? 'selected' : '' }}>Brand New</option>
                                    <option value="2" {{ $car->condition == 2 ? 'selected' : '' }}>Re-Condition
                                    </option>
                                    <option value="3" {{ $car->condition == 3 ? 'selected' : '' }}>Used</option>
                                </select>
                                @error('condition')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Milage --}}
                            <div class="mt-2 col-lg-6">
                                <label for="milage" class="form-label">Milage</label>
                                <input type="text" name="milage" id="milage" class="form-control"
                                    value="{{ $car->milage }}" required>
                                @error('milage')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Transmission --}}
                            <div class="mt-2 col-lg-6">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select name="transmission" id="transmission" class="form-select" required>
                                    <option value="">Select Transmission</option>
                                    <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>
                                        Automatic</option>
                                    <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual
                                    </option>
                                    @error('transmission')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>

                            {{-- Year --}}
                            <div class="mt-2 col-lg-6">
                                <label for="year" class="form-label">Year</label>
                                <input type="text" name="year" id="year" class="form-control"
                                    value="{{ $car->year }}" required>
                                @error('year')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fuel Type --}}
                            <div class="mt-2 col-lg-6">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select name="fuel_type" id="fuel_type" class="form-select" required>
                                    <option value="">Select Fuel</option>
                                    <option value="Petrol" {{ $car->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol
                                    </option>
                                    <option value="Diesel" {{ $car->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel
                                    </option>
                                    <option value="Electric" {{ $car->fuel_type == 'Electric' ? 'selected' : '' }}>
                                        Electric
                                    </option>
                                    <option value="Hybrid" {{ $car->fuel_type == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                    </option>
                                </select>
                                @error('fuel_type')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Color --}}
                            <div class="mt-2 col-lg-6">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" name="color" id="color" class="form-control"
                                    value="{{ $car->color }}" required>
                                @error('color')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Doors --}}
                            <div class="mt-2 col-lg-6">
                                <label for="doors" class="form-label">Doors</label>
                                <input type="number" name="doors" id="doors" class="form-control"
                                    value="{{ $car->doors }}" min="2" max="5" required>
                                @error('doors')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Cylinders --}}
                            <div class="mt-2 col-lg-6">
                                <label for="cylenders" class="form-label">Cylinders</label>
                                <input type="number" name="cylenders" id="cylenders" class="form-control"
                                    value="{{ $car->cylenders }}" required>
                                @error('cylenders')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Engine --}}
                            <div class="mt-2 col-lg-6">
                                <label for="engine" class="form-label">Engine (cc)</label>
                                <input type="number" name="engine" id="engine" class="form-control"
                                    value="{{ $car->engine }}" required>
                                @error('engine')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- VIN Number --}}
                            <div class="mt-2 col-lg-6">
                                <label for="vin_number" class="form-label">VIN Number</label>
                                <input type="text" name="vin_number" id="vin_number" class="form-control"
                                    value="{{ $car->vin_number }}">
                                @error('vin_number')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="mt-2 col-lg-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    value="{{ $car->price }}" required>
                                @error('price')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Images --}}
                            <div class="mt-2 col-lg-6">
                                <label for="images" class="form-label">Car Images</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                @error('images')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                                <small>You can upload multiple images (max 5). Each under 3MB.</small>
                            </div>

                            {{-- Description --}}
                            <div class="mt-2 col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control">{{ $car->description }}</textarea>
                                @error('description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- SEO --}}
                            <div class="mt-3 col-lg-12">
                                <h5>SEO Information</h5>
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control"
                                    value="{{ $car->meta_title }}">
                                @error('meta_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" id="meta_description" class="form-control"
                                    value="{{ $car->meta_description }}">
                                @error('meta_description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                    value="{{ $car->meta_keywords }}">
                                @error('meta_keywords')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update Car</button>
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
            $("#brand_id").on('change', function() {
                let brandId = $(this).val();
                let modelSelect = $("#model_id");

                // 🔥 Clear old options
                modelSelect.html('');

                $.ajax({
                    type: "GET",
                    url: "{{ route('getModels') }}",
                    data: {
                        brand_id: brandId,
                    },
                    success: function(response) {
                        if (response.status && response.models.length > 0) {
                            // Append new options
                            $.each(response.models, function(index, model) {
                                modelSelect.append(
                                    `<option value="${model.id}">${model.title}</option>`
                                );
                            });
                        } else {
                            modelSelect.append(
                                `<option value="" selected disabled>No model found</option>`
                            );
                        }
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            removePlugins: 'exportpdf'
        });
    </script>
@endpush

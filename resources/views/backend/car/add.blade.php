@extends('backend.layout.master')

@section('title')
    Add Car
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Add car</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.car.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Car Name --}}
                            <div class="mt-2 col-lg-6">
                                <label for="name" class="form-label">Car Name</label>
                                <input type="text" name="name" placeholder="Enter car name..." id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Brand --}}
                            <div class="mt-2 col-lg-6">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select name="brand_id" id="brand_id"
                                    class="form-select @error('brand_id') is-invalid @enderror" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Rating --}}
                            <div class="mt-2 col-lg-6">
                                <label for="rating" class="form-label">Rating (1-5)</label>
                                <select name="rating" id="rating"
                                    class="form-select @error('rating') is-invalid @enderror">
                                    <option {{ old('rating') == 1 ? 'selected' : '' }} value="1">1 Star</option>
                                    <option {{ old('rating') == 2 ? 'selected' : '' }} value="2">2 Star</option>
                                    <option {{ old('rating') == 3 ? 'selected' : '' }} value="3">3 Star</option>
                                    <option {{ old('rating') == 4 ? 'selected' : '' }} value="4">4 Star</option>
                                    <option {{ old('rating') == 5 ? 'selected' : '' }} value="5">5 Star</option>
                                </select>
                                @error('rating')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Body Type --}}
                            <div class="mt-2 col-lg-6">
                                <label for="body_type" class="form-label">Body Type</label>
                                <select name="body_type" id="body_type"
                                    class="form-select @error('body_type') is-invalid @enderror" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('body_type') == $category->id ? 'selected' : '' }}>
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
                                <select name="condition" id="condition"
                                    class="form-control @error('condition') is-invalid @enderror">
                                    <option {{ old('condition') == 1 ? 'selected' : '' }} value="1">Brand new</option>
                                    <option {{ old('condition') == 1 ? 'selected' : '' }} value="2">Pre-owned</option>
                                    <option {{ old('condition') == 1 ? 'selected' : '' }} value="3">Used</option>
                                </select>
                                @error('condition')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Milage --}}
                            <div class="mt-2 col-lg-6">
                                <label for="milage" class="form-label">Milage</label>
                                <input type="text" name="milage" id="milage" placeholder="e.g., 15 km/l"
                                    class="form-control @error('milage') is-invalid @enderror" value="{{ old('milage') }}"
                                    required>
                                @error('milage')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Transmission --}}
                            <div class="mt-2 col-lg-6">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select name="transmission" id="transmission"
                                    class="form-select @error('transmission') is-invalid @enderror" required>
                                    <option value="">Select Transmission</option>
                                    <option value="Automatic" {{ old('transmission') == 'Automatic' ? 'selected' : '' }}>
                                        Automatic</option>
                                    <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual
                                    </option>
                                </select>
                                @error('transmission')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Year --}}
                            <div class="mt-2 col-lg-6">
                                <label for="year" class="form-label">Year</label>
                                <input type="text" name="year" id="year" placeholder="e.g., 2022"
                                    class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}"
                                    required>
                                @error('year')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fuel Type --}}
                            <div class="mt-2 col-lg-6">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select name="fuel_type" id="fuel_type"
                                    class="form-select @error('fuel_type') is-invalid @enderror" required>
                                    <option value="">Select Fuel</option>
                                    <option value="Petrol" {{ old('fuel_type') == 'Petrol' ? 'selected' : '' }}>Petrol
                                    </option>
                                    <option value="Diesel" {{ old('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel
                                    </option>
                                    <option value="Electric" {{ old('fuel_type') == 'Electric' ? 'selected' : '' }}>
                                        Electric</option>
                                    <option value="Hybrid" {{ old('fuel_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                    </option>
                                </select>
                                @error('fuel_type')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Color --}}
                            <div class="mt-2 col-lg-6">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" name="color" id="color" placeholder="e.g., Red"
                                    class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}"
                                    required>
                                @error('color')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Doors --}}
                            <div class="mt-2 col-lg-6">
                                <label for="doors" class="form-label">Doors</label>
                                <input type="number" name="doors" id="doors" min="2" max="5"
                                    class="form-control @error('doors') is-invalid @enderror"
                                    value="{{ old('doors') }}" required>
                                @error('doors')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Cylinders --}}
                            <div class="mt-2 col-lg-6">
                                <label for="cylenders" class="form-label">Cylinders</label>
                                <input type="number" name="cylenders" id="cylenders"
                                    class="form-control @error('cylenders') is-invalid @enderror"
                                    value="{{ old('cylenders') }}" required>
                                @error('cylenders')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Engine --}}
                            <div class="mt-2 col-lg-6">
                                <label for="engine" class="form-label">Engine (cc)</label>
                                <input type="number" name="engine" id="engine"
                                    class="form-control @error('engine') is-invalid @enderror"
                                    value="{{ old('engine') }}" required>
                                @error('engine')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- VIN Number --}}
                            <div class="mt-2 col-lg-6">
                                <label for="vin_number" class="form-label">VIN Number</label>
                                <input type="text" name="vin_number" id="vin_number"
                                    class="form-control @error('vin_number') is-invalid @enderror"
                                    value="{{ old('vin_number') }}" required>
                                @error('vin_number')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- VIN Number --}}
                            <div class="mt-2 col-lg-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Images --}}
                            <div class="mt-2 col-lg-6">
                                <label for="images" class="form-label">Car Images</label>
                                <input type="file" name="images[]" id="images"
                                    class="form-control @error('images.*') is-invalid @enderror" multiple required>

                                {{-- Error message for each uploaded file --}}
                                @error('images')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror

                                <small class="form-text text-muted">
                                    You can upload multiple images (max 10). Each image should be under 3MB.
                                </small>
                            </div>

                            {{-- Description --}}
                            <div class="mt-2 col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- SEO Fields --}}
                            <div class="mt-2 col-lg-12">
                                <h5>SEO Information</h5>
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title"
                                    class="form-control @error('meta_title') is-invalid @enderror"
                                    value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" id="meta_description"
                                    class="form-control @error('meta_description') is-invalid @enderror"
                                    value="{{ old('meta_description') }}">
                                @error('meta_description')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-2 col-lg-4">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords"
                                    class="form-control @error('meta_keywords') is-invalid @enderror"
                                    value="{{ old('meta_keywords') }}">
                                @error('meta_keywords')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Add Car</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            removePlugins: 'exportpdf'
        });
    </script>
@endpush

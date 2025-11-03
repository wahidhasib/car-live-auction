@extends('backend.layout.master')

@section('title')
    Brands
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Brands</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand Title</th>
                                    <th>Brand Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->brand_title }}</td>
                                        <td><img src="{{ asset('storage/' . $brand->brand_logo) }}" alt=""
                                                height="40px" width="40px"></td>
                                        <td>
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $brand->id }}"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="6">No brand found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Add Carousel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="brand_title" class="form-label">Brand Title</label>
                            <input type="text" placeholder="Brand name..." value="{{ old('brand_title') }}"
                                class="form-control @error('brand_title') is-invalid @enderror" id="brand_title"
                                name="brand_title" required>
                            @error('brand_title')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand_logo" class="form-label">Brand Logo</label>
                            <input type="file" name="brand_logo" id="brand_logo"
                                class="form-control @error('brand_logo') is-invalid @enderror" name="brand_logo" required>
                            @error('brand_logo')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" id="deleteForm">
        @method('DELETE')
        @csrf
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".deleteBtn").click(function(e) {
                e.preventDefault();
                let form = $("#deleteForm"); // get the form of this button
                let delId = $(this).data("id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    width: '400px',
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ route('admin.brand.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

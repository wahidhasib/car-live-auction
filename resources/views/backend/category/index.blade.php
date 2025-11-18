@extends('backend.layout.master')

@section('title')
    Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Categories</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_slug }}</td>
                                        <td><img src="{{ asset('storage/' . $category->category_image) }}" alt=""
                                                height="40px" width="40px"></td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $category->id }}"><i
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
                    <h4 class="text-light">Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" placeholder="Sports..." value="{{ old('category_name') }}"
                                class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                name="category_name" required>
                            @error('category_name')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="category_slug" class="form-label">Category Slug</label>
                            <input type="text" placeholder="sports" value="{{ old('category_slug') }}"
                                class="form-control @error('category_slug') is-invalid @enderror" id="category_slug"
                                name="category_slug" required>
                            @error('category_slug')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="category_image" class="form-label">Category Image</label>
                            <input type="file" name="category_image" id="category_image"
                                class="form-control @error('category_image') is-invalid @enderror" name="category_image"
                                required>
                            @error('category_image')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Add Category</button>
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
            // making perfect slug
            $("#category_slug").on('keyup', function() {
                let slug = $(this).val().toLowerCase()
                    .replace(/[\s_]+/g, '-')
                    .replace(/[^a-z0-9-]/g, '')
                    .replace(/-+/g, '-')
                    .replace(/^-+|-+$/g, '-');

                $("#category_slug").val(slug);
            });

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
                        var url = "{{ route('admin.category.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

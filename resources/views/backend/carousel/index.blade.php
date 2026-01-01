@extends('backend.layout.master')

@section('title')
    Carousels
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Carousels</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Main Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td><img src="{{ asset('storage/' . $slider->carousel_image) }}" alt=""
                                            width="40px" height="40px"></td>
                                    </td>
                                    <td><span
                                            class="badge text-bg-{{ $slider->carousel_status == 1 ? 'success' : 'warning' }}">{{ $slider->carousel_status == 1 ? 'Published' : 'Draft' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.carousel.edit', $slider->id) }}"
                                            class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $slider->id }}"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="6">No slider found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-light">Add Carousel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="carousel_image" class="form-label">Main Image</label>
                            <input type="file" name="carousel_image" id="carousel_image"
                                class="form-control @error('carousel_image') is-invalid @enderror" name="carousel_image"
                                required>
                            @error('carousel_image')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="carousel_status" class="form-label">Status</label>
                            <select name="carousel_status" id="carousel_status"
                                class="form-control @error('carousel_status') is-invalid @enderror" required>
                                <option value="1">Published</option>
                                <option value="2">Draft</option>
                            </select>
                            @error('carousel_status')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Add Carousel</button>
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
                        var url = "{{ route('admin.carousel.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

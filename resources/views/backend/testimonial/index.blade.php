@extends('backend.layout.master')

@section('title')
    Testimonials
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Testimonials</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ Str::limit($testimonial->comment, 50, '...') }}</td>
                                        <td>{{ $testimonial->rating }}</td>
                                        <td><img src="{{ asset('storage/' . $testimonial->image) }}" alt=""
                                                height="40px" width="40px"></td>
                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger btn-sm deleteBtn"
                                                data-id="{{ $testimonial->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="6">No testimonial found.</td>
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
                    <h4 class="text-light">Add Testimonial</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="John Doe..." value="{{ old('name') }}"
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
                                <option value="customer">Customer</option>
                                <option value="authority">Authority</option>
                            </select>
                            @error('designation')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" id="rating"
                                class="form-control @error('rating') is-invalid @enderror">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('rating')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" name="image" required>
                            @error('image')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Add Review</button>
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
                        var url = "{{ route('admin.testimonial.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

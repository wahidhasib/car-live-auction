@extends('backend.layout.master')

@section('title')
    Models
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Models</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Model</th>
                                    <th>Brand Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $model)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $model->title }}</td>
                                        <td>{{ $model->brand->brand_title }}</td>
                                        <td>
                                            <a href="{{ route('admin.model.edit', $model->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $model->id }}"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="6">No model found.</td>
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
                    <h4 class="text-light">Add Model</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.model.store') }}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="title" class="form-label">Model Title</label>
                            <input type="text" placeholder="Model name..." value="{{ old('title') }}"
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
                                    <option value="{{ $brand->id }}">{{ $brand->brand_title }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('brand_id')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-brand">Add Model</button>
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
                        var url = "{{ route('admin.model.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

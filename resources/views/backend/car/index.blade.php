@extends('backend.layout.master')

@section('title')
    Cars
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-black">
                    <h4 class="text-white">Cars</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Condition</th>
                                    <th>Color</th>
                                    <th>Engine (cc)</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $conditions = [
                                        1 => ['label' => 'Brand New', 'class' => 'success'],
                                        2 => ['label' => 'Pre-owned', 'class' => 'info'],
                                        3 => ['label' => 'Used', 'class' => 'warning'],
                                    ];
                                @endphp

                                @forelse ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->brand->brand_title }}</td>
                                        <td>{{ $car->category->category_name }}</td>
                                        <td>
                                            <span class="badge bg-{{ $conditions[$car->condition]['class'] }}">
                                                {{ $conditions[$car->condition]['label'] }}
                                            </span>
                                        </td>
                                        <td>{{ $car->color }}</td>
                                        <td>{{ $car->engine }}</td>
                                        <td><img src="{{ asset('storage/' . $car->images[0]->image_path) }}" alt="img"
                                                height="40px" width="40px"></td>
                                        <td>
                                            <a href="{{ route('admin.car.edit', $car->id) }}" class="btn btn-info btn-sm"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger btn-sm deleteBtn"
                                                data-id="{{ $car->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="9">No car found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
                        var url = "{{ route('admin.car.destroy', ':id') }}";
                        url = url.replace(':id', delId);
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

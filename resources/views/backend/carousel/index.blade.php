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
                                <th>Title</th>
                                <th>Main Image</th>
                                <th>BG Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img src="{{ asset('storage/' . $slider->image) }}" alt=""></td>
                                    <td><img src="{{ asset('storage/' . $slider->background) }}" alt=""></td>
                                    <td>
                                        <a href="" class="btn btn-info">edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="5">No slider found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

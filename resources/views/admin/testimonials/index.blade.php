@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Testimonials</h1>
    <a class="btn btn-primary" href="{{ route('admin.testimonials.create') }}">Add New Testimonial</a>
</div>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-bordered">
    <tr class="table-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Imag</th>
        <th>Position</th>
        <th>Content</th>
        <th>Actions</th>
    </tr>
    @foreach ($testimonials as $testimonial)
        <tr>
            <td>{{ $testimonial->id }}</td>
            <td>{{ $testimonial->name }}</td>
            <td><img width="100" src="{{ asset('uploads/images/'.$testimonial->image) }}" alt=""></td>
            <td>{{ $testimonial->position }}</td>
            <td>{{ $testimonial->content }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.testimonials.edit', $testimonial->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $testimonials->links() }}
@stop



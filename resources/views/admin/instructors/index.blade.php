@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Instructor</h1>
    <a class="btn btn-primary" href="{{ route('admin.instructors.create') }}">Add New Instructors</a>
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
        <th>Image</th>
        <th>Position</th>
        <th>Link Facebook</th>
        <th>Link Twitter</th>
        <th>Link Linkedln</th>
        <th>Actions</th>
    </tr>
    @foreach ($instructors as $instructor)
        <tr>
            <td>{{ $instructor->id }}</td>
            <td><img width="100" src="{{ asset('uploads/images/'.$instructor->image) }}" alt=""></td>
            <td>{{ $instructor->name }}</td>
            <td>{{ $instructor->position }}</td>
            <td>{{ $instructor->fb_link }}</td>
            <td>{{ $instructor->tw_link }}</td>
            <td>{{ $instructor->ln_link }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.instructors.edit', $instructor->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.instructors.destroy', $instructor->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{-- {{ $instructor->links() }} --}}
@stop



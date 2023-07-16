@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Courses</h1>
    <a class="btn btn-primary" href="{{ route('admin.courses.create') }}">Add New Course</a>
</div>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-bordered">
    <tr class="table-primary">
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Duration</th>
        <th>Content</th>
        <th>Instructor</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td><img width="100" src="{{ asset('uploads/images/'.$course->image) }}" alt=""></td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->price }}</td>
            <td>{{ $course->duration }}</td>
            <td>{{ $course->content }}</td>
            <td>{{ $course->instructor_id }}</td>
            <td>{{ $course->category_id }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.courses.destroy', $course->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $courses->links() }}
@stop



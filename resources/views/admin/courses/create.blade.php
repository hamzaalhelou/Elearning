@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Add New Course</h1>
    <a class="btn btn-primary" href="{{ route('admin.courses.index') }}">All Courses</a>
</div>

@include('admin.errors')

<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Title</label>
    <input type="text" placeholder="Title" class="form-control" name="title" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" class="form-control" name="image" />
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number" placeholder="Price" class="form-control" name="price" />
</div>

<div class="mb-3">
    <label>Duration</label>
    <input type="text" placeholder="Duration" class="form-control" name="duration" />
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea placeholder="Content" class="form-control" name="content" rows="5"></textarea>
</div>

<div class="mb-3">
    <label>Instructor</label>
    <select class="form-control" name="instructor_id">
        @foreach ($instructors as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Category</label>
    <select class="form-control" name="category_id">
        @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>

<button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
<button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i> Cancel</button>
</form>

@stop



@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Edit Testimonial</h1>
    <a class="btn btn-primary" href="{{ route('admin.testimonials.index') }}">All Testimonials</a>
</div>

@include('admin.errors')

<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

<div class="mb-3">
    <label>Name</label>
    <input type="text" placeholder="Name" class="form-control" value="{{ $testimonial->name }}" name="name" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" class="form-control" name="image" />
    <img width="100" src="{{ asset('uploads/images/'.$testimonial->image) }}" alt="">
</div>
<div class="mb-3">
    <label>Position</label>
    <input type="text" placeholder="Position" class="form-control" value="{{ $testimonial->position }}" name="position" />
</div>
<div class="mb-3">
    <label>Content</label>
    <input type="text" placeholder="Content" class="form-control" value="{{ $testimonial->content }}" name="content" />
</div>
<button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
<button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i> Cancel</button>
</form>

@stop



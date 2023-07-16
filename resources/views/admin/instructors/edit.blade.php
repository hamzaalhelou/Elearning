@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Edit Instructor</h1>
    <a class="btn btn-primary" href="{{ route('admin.instructors.index') }}">All Instructors</a>
</div>

@include('admin.errors')

<form action="{{ route('admin.instructors.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

<div class="mb-3">
    <label>ID</label>
    <input type="text" class="form-control" disabled value="{{ $instructor->id }}" name="id" />
</div>
<div class="mb-3">
    <label>Name</label>
    <input type="text" placeholder="Name" class="form-control" value="{{ $instructor->name }}" name="name" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" class="form-control" name="image" />
    <img width="100" src="{{ asset('uploads/images/'.$instructor->image) }}" alt="">
</div>
<div class="mb-3">
    <label>Position</label>
    <input type="text" placeholder="Position" class="form-control" value="{{ $instructor->position }}" name="position" />
</div>

<div class="mb-3">
    <label>Link Facebook</label>
    <input type="url" placeholder="Link Facebook" class="form-control" value="{{ $instructor->fb_link }}" name="fb_link" />
</div>
<div class="mb-3">
    <label>Link Twitter</label>
    <input type="url" placeholder="Link Twitter" class="form-control" value="{{ $instructor->tw_link }}" name="tw_link" />
</div>
<div class="mb-3">
    <label>Link Linkedln</label>
    <input type="url" placeholder="Link Linkedln" class="form-control" value="{{ $instructor->ln_link }}" name="ln_link" />
</div>

<button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
<button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i> Cancel</button>
</form>

@stop



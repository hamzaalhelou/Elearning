@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Add New Instructor</h1>
    <a class="btn btn-primary" href="{{ route('admin.instructors.index') }}">All Courses</a>
</div>

@include('admin.errors')

<form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" placeholder="Name" class="form-control" name="name" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" class="form-control" name="image" />
</div>
<div class="mb-3">
    <label>Position</label>
    <input type="text" placeholder="Position" class="form-control" name="position" />
</div>
<div class="mb-3">
    <label>Link Facebook</label>
    <input type="url" placeholder="Link Facebook" class="form-control" name="fb_link" />
</div>
<div class="mb-3">
    <label>Link Twitter</label>
    <input type="url" placeholder="Link Twitter" class="form-control" name="tw_link" />
</div>
<div class="mb-3">
    <label>Link Linkedln</label>
    <input type="url" placeholder="Link Linkedln" class="form-control" name="ln_link" />
</div>
<button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
<button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i> Cancel</button>
</form>

@stop



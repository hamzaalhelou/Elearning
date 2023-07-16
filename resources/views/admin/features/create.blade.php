@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Add New Feature</h1>
    <a class="btn btn-primary" href="{{ route('admin.features.index') }}">All Features</a>
</div>

@include('admin.errors')

<form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label>Icon</label>
    <input type="text" placeholder="Icon" class="form-control" name="icon" />
</div>
<div class="mb-3">
    <label>Title</label>
    <input type="text" placeholder="Title" class="form-control" name="title" />
</div>
<div class="mb-3">
    <label>Content</label>
    <input type="text" placeholder="Content" class="form-control" name="content" />
</div>


<button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
<button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i> Cancel</button>
</form>

@stop



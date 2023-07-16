@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Categories</h1>
    <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Add New Category</a>
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
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><img width="100" src="{{ asset('uploads/images/'.$category->image) }}" alt=""></td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $categories->links() }}
@stop



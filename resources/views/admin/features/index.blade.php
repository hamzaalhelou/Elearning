@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center  mb-4">
    <h1 class="h3 text-gray-800 mb-0">Features</h1>
    <a class="btn btn-primary" href="{{ route('admin.features.create') }}">Add New Feature</a>
</div>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-bordered">
    <tr class="table-primary">
        <th>ID</th>
        <th>Icon</th>
        <th>Title</th>
        <th>content</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    @foreach ($features as $feature)
        <tr>
            <td>{{ $feature->id }}</td>
            <td>{{ $feature->icon }}</td>
            <td>{{ $feature->title }}</td>
            <td>{{ $feature->content }}</td>
            <td>{{ $feature->created_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.features.edit', $feature->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.features.destroy', $feature->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $features->links() }}
@stop



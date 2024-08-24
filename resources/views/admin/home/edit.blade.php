@extends('admin.layouts.master')
@section('title', 'Edit Content')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.home.update', $homes->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $homes->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ asset('storage/' . $homes->image) }}" alt="{{ $homes->title }}" width="100" class="mt-2">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ $homes->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.home.index')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

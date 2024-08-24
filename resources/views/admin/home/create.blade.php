@extends('admin.layouts.master')
@section('title', 'Create Content')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Create Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.home.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.home.index')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

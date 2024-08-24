@extends('admin.layouts.master')
@section('title', 'Create Abouts')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Create Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tentang1" class="form-label">Tentang 1</label>
                    <textarea  name="tentang1" id="tentang1" class="form-control" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tentang2" class="form-label">Tentang 2</label>
                    <textarea name="tentang2" id="tentang2" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.about.index')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

@extends('admin.layouts.master')
@section('title', 'Edit Abouts')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about.update', $abouts->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tentang1" class="form-label">Tentang 1</label>
                    <textarea type="text" name="tentang1" id="tentang1" class="form-control" rows="5"  required>{{ $abouts->tentang1 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tentang2" class="form-label">Tentang 2</label>
                    <textarea name="tentang2" id="tentang2" class="form-control" rows="5" required>{{ $abouts->tentang2 }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.about.index')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

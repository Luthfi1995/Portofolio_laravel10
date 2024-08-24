@extends('admin.layouts.master')
@section('title', 'Create Portofolio')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Create Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{old('nama')}}" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.portofolio')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

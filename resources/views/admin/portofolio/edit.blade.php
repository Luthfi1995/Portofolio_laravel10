@extends('admin.layouts.master')
@section('title', 'Edit Portofolio')

@section('main-content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Content
        </div>
        <div class="card-body">
            <form action="{{ route('admin.portofolio.update', $portofolios->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $portofolios->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <img src="{{ asset('storage/' . $portofolios->gambar) }}" alt="{{ $portofolios->nama }}" width="100" class="mt-2">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ $portofolios->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.portofolio')}}" type="button" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

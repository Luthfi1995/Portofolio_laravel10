@extends('admin.layouts.master')
@section('title', 'Abouts')

@section('main-content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Create Content</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">

            <i class="fas fa-table me-1"></i>
            Home Content
        </div>
        <div class="card-body">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Tentang 1</th>
                        <th>Tentang 2</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $about->tentang1 }}</td>
                            <td>{{ $about->tentang2 }}</td>
                            <td >
                                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning btn-sm mb-2 text-center">Edit</a>
                                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

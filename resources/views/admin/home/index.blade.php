@extends('admin.layouts.master')
@section('title', 'Home')

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
        <a href="{{ route('admin.home.create') }}" class="btn btn-primary">Create Content</a>
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Deskripsi</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($homes as $home)
                        <tr>
                            <td>{{ $home->title }}</td>
                            <td><img src="{{ asset('storage/' . $home->image) }}" alt="{{ $home->title }}" width="50"></td>
                            <td>{{ $home->description }}</td>
                            <td >
                                <a href="{{ route('admin.home.edit', $home->id) }}" class="btn btn-warning btn-sm mb-2 text-center">Edit</a>
                                <form action="{{ route('admin.home.destroy', $home->id) }}" method="POST"
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

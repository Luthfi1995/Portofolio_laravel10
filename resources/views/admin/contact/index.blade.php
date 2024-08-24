@extends('admin.layouts.master')
@section('title', 'Contact')

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
    <div class="card mb-4">
        <div class="card-header">

            <i class="fas fa-table me-1"></i>
            Contact Persion
        </div>
        <div class="card-body">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Pesan</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.home.edit', $home->id) }}"
                                    class="btn btn-warning btn-sm mb-2 text-center">Edit</a> --}}
                                <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
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

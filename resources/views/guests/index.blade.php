@extends('layouts.master')

@section('title', 'Guests')

@section('content')
<div class="container mt-5">
    <h1>Guests</h1>
    <a href="{{ route('guests.create') }}" class="btn btn-primary mb-3">Add Guest</a>
    <form method="GET" action="{{ route('guests.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search guests..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
            <tr>
                <td>{{ $guest->id }}</td>
                <td>{{ $guest->name }}</td>
                <td>{{ $guest->email }}</td>
                <td>{{ $guest->phone_number }}</td>
                <td>{{ $guest->address }}</td>
                <td>
                    <a href="{{ route('guests.show', $guest->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guests->links() }}
</div>
@endsection

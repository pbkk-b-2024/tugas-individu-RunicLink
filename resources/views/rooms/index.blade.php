@extends('layouts.master')

@section('title', 'Rooms')

@section('content')
<div class="container mt-5">
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Add Room</a>
    <form method="GET" action="{{ route('rooms.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search rooms..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Type</th>
                <th>Price per Night</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->type }}</td>
                <td>{{ $room->price_per_night }}</td>
                <td>{{ $room->status }}</td>
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $rooms->links() }}
</div>
@endsection

<!-- resources/views/room2/index.blade.php -->
@extends('layouts.master')

@section('title', 'Room2')

@section('content')
<div class="container mt-5">
    <h1>Room</h1>
    <!-- Search form -->
    <form method="GET" action="{{ route('room2.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search rooms..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <!-- Rooms table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Type</th>
                <th>Price per Night</th>
                <th>Status</th>
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
                    <a href="{{ route('room2.show', $room->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    {{ $rooms->links() }}
</div>
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection

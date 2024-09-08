@extends('layouts.master')

@section('title', 'Reservations')

@section('content')
<div class="container mt-5">
    <h1>Reservations</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Add Reservation</a>
    <form method="GET" action="{{ route('reservations.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search reservations..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guest</th>
                <th>Room</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->guest->name }}</td>
                <td>{{ $reservation->room->room_number }}</td>
                <td>{{ $reservation->check_in_date }}</td>
                <td>{{ $reservation->check_out_date }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $reservations->links() }}
</div>
@endsection

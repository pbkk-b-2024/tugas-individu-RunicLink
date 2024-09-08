@extends('layouts.master')

@section('title', 'Facility Reservations')

@section('content')
<div class="container mt-5">
    <h1>Facility Reservations</h1>
    <a href="{{ route('facility_reservations.create') }}" class="btn btn-primary mb-3">Add Facility Reservation</a>
    <form method="GET" action="{{ route('facility_reservations.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search facility reservations..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Facility</th>
                <th>Reservation</th>
                <th>Usage Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilityReservations as $facilityReservation)
            <tr>
                <td>{{ $facilityReservation->id }}</td>
                <td>{{ $facilityReservation->facility->name }}</td>
                <td>{{ $facilityReservation->reservation->id }}</td>
                <td>{{ $facilityReservation->usage_date }}</td>
                <td>
                    <a href="{{ route('facility_reservations.show', $facilityReservation->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('facility_reservations.edit', $facilityReservation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('facility_reservations.destroy', $facilityReservation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $facilityReservations->links() }}
</div>
@endsection

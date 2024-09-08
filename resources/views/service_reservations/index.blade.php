@extends('layouts.master')

@section('title', 'Service Reservations')

@section('content')
<div class="container mt-5">
    <h1>Service Reservations</h1>
    <a href="{{ route('service_reservations.create') }}" class="btn btn-primary mb-3">Add Service Reservation</a>
    <form method="GET" action="{{ route('service_reservations.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search service reservations..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Reservation</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serviceReservations as $serviceReservation)
            <tr>
                <td>{{ $serviceReservation->id }}</td>
                <td>{{ $serviceReservation->service->name }}</td>
                <td>{{ $serviceReservation->reservation->id }}</td>
                <td>{{ $serviceReservation->quantity }}</td>
                <td>
                    <a href="{{ route('service_reservations.show', $serviceReservation->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('service_reservations.edit', $serviceReservation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('service_reservations.destroy', $serviceReservation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $serviceReservations->links() }}
</div>
@endsection

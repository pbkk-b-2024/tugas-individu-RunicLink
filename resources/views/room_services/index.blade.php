@extends('layouts.master')

@section('title', 'Room Services')

@section('content')
<div class="container mt-5">
    <h1>Room Services</h1>
    <a href="{{ route('room_services.create') }}" class="btn btn-primary mb-3">Add Room Service</a>
    <form method="GET" action="{{ route('room_services.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search room services..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>Employee</th>
                <th>Service Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roomServices as $roomService)
            <tr>
                <td>{{ $roomService->id }}</td>
                <td>{{ $roomService->room->id }}</td>
                <td>{{ $roomService->employee->name }}</td>
                <td>{{ $roomService->service_date }}</td>
                <td>
                    <a href="{{ route('room_services.show', $roomService->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('room_services.edit', $roomService->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('room_services.destroy', $roomService->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $roomServices->links() }}
</div>
@endsection

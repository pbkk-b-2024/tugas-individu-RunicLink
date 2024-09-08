@extends('layouts.master')

@section('title', 'Edit Room Service')

@section('content')
<div class="container mt-5">
    <h1>Edit Room Service</h1>
    <form action="{{ route('room_services.update', $roomService->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $roomService->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select class="form-control" id="room_id" name="room_id" required>
                @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ $roomService->room_id == $room->id ? 'selected' : '' }}>{{ $room->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $roomService->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_date">Service Date</label>
            <input type="date" class="form-control" id="service_date" name="service_date" value="{{ $roomService->service_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Room Service</button>
    </form>
</div>
@endsection

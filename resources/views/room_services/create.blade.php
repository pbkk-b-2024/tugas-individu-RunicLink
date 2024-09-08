@extends('layouts.master')

@section('title', 'Add Room Service')

@section('content')
<div class="container mt-5">
    <h1>Add Room Service</h1>
    <form action="{{ route('room_services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select class="form-control" id="room_id" name="room_id" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_date">Service Date</label>
            <input type="date" class="form-control" id="service_date" name="service_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Room Service</button>
    </form>
</div>
@endsection

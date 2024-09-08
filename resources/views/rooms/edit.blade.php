@extends('layouts.master')

@section('title', 'Edit Room')

@section('content')
<div class="container mt-5">
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $room->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $room->type }}" required>
        </div>
        <div class="form-group">
            <label for="price_per_night">Price per Night</label>
            <input type="number" step="0.01" class="form-control" id="price_per_night" name="price_per_night" value="{{ $room->price_per_night }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Available" {{ $room->status == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Occupied" {{ $room->status == 'Occupied' ? 'selected' : '' }}>Occupied</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
@endsection

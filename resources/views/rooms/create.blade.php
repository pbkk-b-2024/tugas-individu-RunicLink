@extends('layouts.master')

@section('title', 'Add Room')

@section('content')
<div class="container mt-5">
    <h1>Add Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" class="form-control" id="room_number" name="room_number" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="price_per_night">Price per Night</label>
            <input type="number" step="0.01" class="form-control" id="price_per_night" name="price_per_night" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Add Reservation')

@section('content')
<div class="container mt-5">
    <h1>Add Reservation</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="guest_id">Guest</label>
            <select class="form-control" id="guest_id" name="guest_id" required>
                @foreach($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select class="form-control" id="room_id" name="room_id" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="check_in_date">Check-in Date</label>
            <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
        </div>
        <div class="form-group">
            <label for="check_out_date">Check-out Date</label>
            <input type="date" class="form-control" id="check_out_date" name="check_out_date" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Booked">Booked</option>
                <option value="Checked-in">Checked-in</option>
                <option value="Checked-out">Checked-out</option>
                <option value="Canceled">Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Reservation</
        </button>
    </form>
</div>
@endsection

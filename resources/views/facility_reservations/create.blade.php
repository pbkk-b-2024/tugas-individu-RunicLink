@extends('layouts.master')

@section('title', 'Add Facility Reservation')

@section('content')
<div class="container mt-5">
    <h1>Add Facility Reservation</h1>
    <form action="{{ route('facility_reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="facility_id">Facility</label>
            <select class="form-control" id="facility_id" name="facility_id" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reservation_id">Reservation</label>
            <select class="form-control" id="reservation_id" name="reservation_id" required>
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}">{{ $reservation->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usage_date">Usage Date</label>
            <input type="date" class="form-control" id="usage_date" name="usage_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Facility Reservation</button>
    </form>
</div>
@endsection

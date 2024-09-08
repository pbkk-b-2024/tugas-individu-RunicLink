@extends('layouts.master')

@section('title', 'Edit Facility Reservation')

@section('content')
<div class="container mt-5">
    <h1>Edit Facility Reservation</h1>
    <form action="{{ route('facility_reservations.update', $facilityReservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $facilityReservation->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="facility_id">Facility</label>
            <select class="form-control" id="facility_id" name="facility_id" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->id }}" {{ $facilityReservation->facility_id == $facility->id ? 'selected' : '' }}>{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reservation_id">Reservation</label>
            <select class="form-control" id="reservation_id" name="reservation_id" required>
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}" {{ $facilityReservation->reservation_id == $reservation->id ? 'selected' : '' }}>{{ $reservation->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usage_date">Usage Date</label>
            <input type="date" class="form-control" id="usage_date" name="usage_date" value="{{ $facilityReservation->usage_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Facility Reservation</button>
    </form>
</div>
@endsection

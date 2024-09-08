@extends('layouts.master')

@section('title', 'Facility Reservation Details')

@section('content')
<div class="container mt-5">
    <h1>Facility Reservation Details</h1>
    <div class="card">
        <div class="card-header">
            Facility Reservation ID: {{ $facilityReservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Facility: {{ $facilityReservation->facility->name }}</h5>
            <p class="card-text">Reservation: {{ $facilityReservation->reservation->id }}</p>
            <p class="card-text">Usage Date: {{ $facilityReservation->usage_date }}</p>
            <a href="{{ route('facility_reservations.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

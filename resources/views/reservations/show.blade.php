@extends('layouts.master')

@section('title', 'Reservation Details')

@section('content')
<div class="container mt-5">
    <h1>Reservation Details</h1>
    <div class="card">
        <div class="card-header">
            Reservation ID: {{ $reservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Guest: {{ $reservation->guest->name }}</h5>
            <p class="card-text">Room: {{ $reservation->room->room_number }}</p>
            <p class="card-text">Check-in Date: {{ $reservation->check_in_date }}</p>
            <p class="card-text">Check-out Date: {{ $reservation->check_out_date }}</p>
            <p class="card-text">Status: {{ $reservation->status }}</p>
            <a href="{{ route('reservations.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

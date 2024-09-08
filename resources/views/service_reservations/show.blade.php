@extends('layouts.master')

@section('title', 'Service Reservation Details')

@section('content')
<div class="container mt-5">
    <h1>Service Reservation Details</h1>
    <div class="card">
        <div class="card-header">
            Service Reservation ID: {{ $serviceReservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Service: {{ $serviceReservation->service->name }}</h5>
            <p class="card-text">Reservation: {{ $serviceReservation->reservation->id }}</p>
            <p class="card-text">Quantity: {{ $serviceReservation->quantity }}</p>
            <a href="{{ route('service_reservations.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Edit Service Reservation')

@section('content')
<div class="container mt-5">
    <h1>Edit Service Reservation</h1>
    <form action="{{ route('service_reservations.update', $serviceReservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $serviceReservation->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="service_id">Service</label>
            <select class="form-control" id="service_id" name="service_id" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $serviceReservation->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reservation_id">Reservation</label>
            <select class="form-control" id="reservation_id" name="reservation_id" required>
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}" {{ $serviceReservation->reservation_id == $reservation->id ? 'selected' : '' }}>{{ $reservation->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $serviceReservation->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Service Reservation</button>
    </form>
</div>
@endsection

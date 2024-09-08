@extends('layouts.master')

@section('title', 'Room Service Details')

@section('content')
<div class="container mt-5">
    <h1>Room Service Details</h1>
    <div class="card">
        <div class="card-header">
            Room Service ID: {{ $roomService->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Room: {{ $roomService->room->id }}</h5>
            <p class="card-text">Employee: {{ $roomService->employee->name }}</p>
            <p class="card-text">Service Date: {{ $roomService->service_date }}</p>
            <a href="{{ route('room_services.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

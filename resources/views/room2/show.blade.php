<!-- resources/views/room2/show.blade.php -->
@extends('layouts.master')

@section('title', 'Room2 Details')

@section('content')
<div class="container mt-5">
    <h1>Room2 Details</h1>
    <div class="card">
        <div class="card-header">
            Room ID: {{ $room->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
            <p class="card-text">Type: {{ $room->type }}</p>
            <p class="card-text">Price per Night: ${{ $room->price_per_night }}</p>
            <p class="card-text">Status: {{ $room->status }}</p>
            <a href="{{ route('room2.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Guest Details')

@section('content')
<div class="container mt-5">
    <h1>Guest Details</h1>
    <div class="card">
        <div class="card-header">
            Guest ID: {{ $guest->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $guest->name }}</h5>
            <p class="card-text">Email: {{ $guest->email }}</p>
            <p class="card-text">Phone Number: {{ $guest->phone_number }}</p>
            <p class="card-text">Address: {{ $guest->address }}</p>
            <a href="{{ route('guests.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

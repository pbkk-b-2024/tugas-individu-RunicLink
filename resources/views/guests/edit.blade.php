@extends('layouts.master')

@section('title', 'Edit Guest')

@section('content')
<div class="container mt-5">
    <h1>Edit Guest</h1>
    <form action="{{ route('guests.update', $guest->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $guest->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $guest->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $guest->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $guest->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address">{{ $guest->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Guest</button>
    </form>
</div>
@endsection

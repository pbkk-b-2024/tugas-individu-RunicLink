@extends('layouts.master')

@section('title', 'Add Guest')

@section('content')
<div class="container mt-5">
    <h1>Add Guest</h1>
    <form action="{{ route('guests.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Guest</button>
    </form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Add Service')

@section('content')
<div class="container mt-5">
    <h1>Add Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
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
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>
</div>
@endsection

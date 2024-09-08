@extends('layouts.master')

@section('title', 'Edit Service')

@section('content')
<div class="container mt-5">
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $service->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $service->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection

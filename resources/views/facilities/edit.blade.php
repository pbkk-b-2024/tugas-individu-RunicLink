@extends('layouts.master')

@section('title', 'Edit Facility')

@section('content')
<div class="container mt-5">
    <h1>Edit Facility</h1>
    <form action="{{ route('facilities.update', $facility->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $facility->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $facility->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $facility->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Facility</button>
    </form>
</div>
@endsection

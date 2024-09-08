@extends('layouts.master')

@section('title', 'Add Facility')

@section('content')
<div class="container mt-5">
    <h1>Add Facility</h1>
    <form action="{{ route('facilities.store') }}" method="POST">
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
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Facility</button>
    </form>
</div>
@endsection

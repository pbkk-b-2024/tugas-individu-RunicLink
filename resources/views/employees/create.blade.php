@extends('layouts.master')

@section('title', 'Add Employee')

@section('content')
<div class="container mt-5">
    <h1>Add Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
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
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position">
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" name="salary">
        </div>
        <div class="form-group">
            <label for="hire_date">Hire Date</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Edit Employee')

@section('content')
<div class="container mt-5">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $employee->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}">
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}">
        </div>
        <div class="form-group">
            <label for="hire_date">Hire Date</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ $employee->hire_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Employee Details')

@section('content')
<div class="container mt-5">
    <h1>Employee Details</h1>
    <div class="card">
        <div class="card-header">
            Employee ID: {{ $employee->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $employee->name }}</h5>
            <p class="card-text">Position: {{ $employee->position }}</p>
            <p class="card-text">Salary: {{ $employee->salary }}</p>
            <p class="card-text">Hire Date: {{ $employee->hire_date }}</p>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

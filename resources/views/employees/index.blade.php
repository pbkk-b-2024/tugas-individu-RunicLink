@extends('layouts.master')

@section('title', 'Employees')

@section('content')
<div class="container mt-5">
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
    <form method="GET" action="{{ route('employees.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search employees..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Hire Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->salary }}</td>
                <td>{{ $employee->hire_date }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>
@endsection

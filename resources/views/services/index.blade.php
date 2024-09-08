@extends('layouts.master')

@section('title', 'Services')

@section('content')
<div class="container mt-5">
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Service</a>
    <form method="GET" action="{{ route('services.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search services..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td>
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $services->links() }}
</div>
@endsection

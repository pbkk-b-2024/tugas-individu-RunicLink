<!-- resources/views/service2/index.blade.php -->
@extends('layouts.master')

@section('title', 'Service2')

@section('content')
<div class="container mt-5">
    <h1>Services</h1>
    <!-- Search form -->
    <form method="GET" action="{{ route('service2.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search services..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <!-- Services table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td>
                    <a href="{{ route('service2.show', $service->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    {{ $services->links() }}
</div>
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection
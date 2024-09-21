<!-- resources/views/facility2/index.blade.php -->
@extends('layouts.master')

@section('title', 'Facility2')

@section('content')
<div class="container mt-5">
    <h1>Facilities</h1>
    <!-- Search form -->
    <form method="GET" action="{{ route('facility2.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search facilities..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <!-- Facilities table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->id }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->description }}</td>
                <td>
                    <a href="{{ route('facility2.show', $facility->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    {{ $facilities->links() }}
</div>
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection
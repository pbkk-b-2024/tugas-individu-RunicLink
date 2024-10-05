@extends('layouts.master')

@section('title', 'Facilities')

@section('content')
<div class="container mt-5">
    <h1>Facilities</h1>
    <a href="{{ route('facilities.create') }}" class="btn btn-primary mb-3">Add Facility</a>
    <form method="GET" action="{{ route('facilities.index') }}" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search facilities..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->id }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->description }}</td>
                <td>
                    @if($facility->image)
                        <img src="{{ asset('images/' . $facility->image) }}" alt="{{ $facility->name }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('facilities.show', $facility->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $facilities->links() }}
</div>
@endsection

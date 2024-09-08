@extends('layouts.master')

@section('title', 'Facility Details')

@section('content')
<div class="container mt-5">
    <h1>Facility Details</h1>
    <div class="card">
        <div class="card-header">
            Facility ID: {{ $facility->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $facility->name }}</h5>
            <p class="card-text">Description: {{ $facility->description }}</p>
            <a href="{{ route('facilities.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

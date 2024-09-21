<!-- resources/views/facility2/show.blade.php -->
@extends('layouts.master')

@section('title', 'Facility2 Details')

@section('content')
<div class="container mt-5">
    <h1>Facility2 Details</h1>
    <div class="card">
        <div class="card-header">
            Facility ID: {{ $facility->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $facility->name }}</h5>
            <p class="card-text">Description: {{ $facility->description }}</p>
            <a href="{{ route('facility2.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection
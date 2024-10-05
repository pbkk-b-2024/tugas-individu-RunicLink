<!-- resources/views/service2/show.blade.php -->
@extends('layouts.master')

@section('title', 'Service2 Details')

@section('content')
<div class="container mt-5">
    <h1>Service Details</h1>
    <div class="card">
        <div class="card-header">
            Service ID: {{ $service->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $service->name }}</h5>
            <p class="card-text">Price: {{ $service->price }}</p>
            <a href="{{ route('service2.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
  @include('components.sidebar_home2')
@endsection
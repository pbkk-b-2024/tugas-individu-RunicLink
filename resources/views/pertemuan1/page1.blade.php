{{-- resources/views/pertemuan1/page1.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Page 1</h1>
    <p>This is Page 1 of the group.</p>
    <a href="{{ route('grup') }}" class="btn btn-secondary">Go Back to Group Index</a>
@endsection

{{-- resources/views/pertemuan1/page3.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Page 3</h1>
    <p>This is Page 3 of the group.</p>
    <a href="{{ route('grup') }}" class="btn btn-secondary">Go Back to Group Index</a>
@endsection

{{-- resources/views/pertemuan1/page2.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Page 2</h1>
    <p>This is Page 2 of the group.</p>
    <a href="{{ route('grup') }}" class="btn btn-secondary">Go Back to Group Index</a>
@endsection

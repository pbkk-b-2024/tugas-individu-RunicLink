{{-- resources/views/pertemuan1.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Basic Routing</h1>
    <p> Route::get('/basic', function () {
    return view('pertemuan1.basic');
}); </p>
    <a href="{{ url('/pertemuan1') }}" class="btn btn-primary">Go Back to Pertemuan 1</a>
@endsection
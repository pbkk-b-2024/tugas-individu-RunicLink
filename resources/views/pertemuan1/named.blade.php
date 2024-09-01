@extends('layouts.admin')

@section('content')
    <h1>Named Routing</h1>
    <p>Route::get('/named', function () {
    return view('pertemuan1.named');
})->name('nama');</p>
    <a href="{{ url('/pertemuan1') }}" class="btn btn-primary">Go Back to Pertemuan 1</a>
@endsection
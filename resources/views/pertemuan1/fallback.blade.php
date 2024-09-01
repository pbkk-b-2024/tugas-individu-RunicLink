{{-- resources/views/pertemuan1.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Fallback Routing</h1><br>
    <p> Page Not Found </p>
    <p> 404 Error </p>
    <p> Route::fallback(function () {
    return response()->view('pertemuan1.fallback', [], 404);
});</p>
    <a href="{{ url('/pertemuan1') }}" class="btn btn-primary">Go Back to Pertemuan 1</a>
@endsection
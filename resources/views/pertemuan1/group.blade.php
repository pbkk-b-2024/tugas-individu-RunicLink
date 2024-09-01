{{-- resources/views/pertemuan1/group.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Group Routing</h1>
    <ul>
        <li><a href="{{ route('page1') }}" class="btn btn-primary">Go to Page 1</a></li><br>
        <li><a href="{{ route('page2') }}" class="btn btn-primary">Go to Page 2</a></li><br>
        <li><a href="{{ route('page3') }}" class="btn btn-primary">Go to Page 3</a></li><br>
    </ul>
    <a href="{{ url('/pertemuan1') }}" class="btn btn-secondary">Go Back to Pertemuan 1</a>
@endsection

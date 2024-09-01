{{-- resources/views/pertemuan1/param.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Parameter Routing</h1>
    <form action="{{ url('/parameter/par') }}" method="GET">
        <div class="form-group">
            <label for="par1">Parameter 1:</label>
            <input type="text" id="par1" name="par1" class="form-control">
        </div>
        <div class="form-group">
            <label for="par2">Parameter 2:</label>
            <input type="text" id="par2" name="par2" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if(isset($par1) || isset($par2))
        <div class="mt-3">
            <h2>Entered Parameters:</h2>
            @if(isset($par1))
                <p>Parameter 1: {{ $par1 }}</p>
            @endif
            @if(isset($par2))
                <p>Parameter 2: {{ $par2 }}</p>
            @endif
        </div>
    @endif

    <a href="{{ url('/pertemuan1') }}" class="btn btn-secondary mt-3">Go Back to Pertemuan 1</a>
@endsection

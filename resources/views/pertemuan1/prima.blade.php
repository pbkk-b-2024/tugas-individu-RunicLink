{{-- resources/views/pertemuan1/prima.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Prima</h1>
    <form action="{{ url('/prima') }}" method="GET">
        <div class="form-group">
            <label for="n">Enter a number:</label>
            <input type="number" id="n" name="n" class="form-control" required min="1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if(!empty($numberDetails))
        <h2>Number Details</h2>
        <ul>
            @foreach($numberDetails as $detail)
                <li>{{ $detail }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url('/pertemuan1') }}" class="btn btn-secondary mt-3">Go Back to Pertemuan 1</a>
@endsection

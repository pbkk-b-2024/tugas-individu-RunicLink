@extends('layouts.master')

@section('title', 'Add Payment')

@section('content')
<div class="container mt-5">
    <h1>Add Payment</h1>
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="reservation_id">Reservation</label>
            <select class="form-control" id="reservation_id" name="reservation_id" required>
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}">{{ $reservation->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Payment</button>
    </form>
</div>
@endsection

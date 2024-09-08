@extends('layouts.master')

@section('title', 'Edit Payment')

@section('content')
<div class="container mt-5">
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $payment->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="reservation_id">Reservation</label>
            <select class="form-control" id="reservation_id" name="reservation_id" required>
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}" {{ $payment->reservation_id == $reservation->id ? 'selected' : '' }}>{{ $reservation->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date }}" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="Credit Card" {{ $payment->payment_method == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                <option value="Cash" {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Bank Transfer" {{ $payment->payment_method == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Payment</button>
    </form>
</div>
@endsection
    
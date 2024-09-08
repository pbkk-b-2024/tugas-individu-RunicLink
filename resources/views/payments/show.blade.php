@extends('layouts.master')

@section('title', 'Payment Details')

@section('content')
<div class="container mt-5">
    <h1>Payment Details</h1>
    <div class="card">
        <div class="card-header">
            Payment ID: {{ $payment->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Reservation: {{ $payment->reservation->id }}</h5>
            <p class="card-text">Amount: {{ $payment->amount }}</p>
            <p class="card-text">Payment Date: {{ $payment->payment_date }}</p>
            <p class="card-text">Payment Method: {{ $payment->payment_method }}</p>
            <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

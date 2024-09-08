@extends('layouts.master')

@section('title', 'Payments')

@section('content')
<div class="container mt-5">
    <h1>Payments</h1>
    
    <!-- Add Payment button -->
    <div class="mb-3">
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
    </div>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Check if there are any payments -->
    @if ($payments->isEmpty())
        <p>No payments found. <a href="{{ route('payments.create') }}">Add a payment</a>.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reservation ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->reservation->id }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>
                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display pagination -->
        {{ $payments->links() }}
    @endif
</div>
@endsection

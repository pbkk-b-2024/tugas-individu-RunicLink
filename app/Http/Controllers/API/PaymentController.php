<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $payments = Payment::with('reservation')
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('reservation', function ($q) use ($search) {
                        $q->where('id', 'like', "%{$search}%");
                    });
            })
            ->paginate(10);

        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:payments',
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Credit Card,Cash,Bank Transfer'
        ]);

        $payment = Payment::create($validatedData);

        return response()->json(['message' => 'Payment created successfully.', 'payment' => $payment], 201);
    }

    public function show(Payment $payment)
    {
        return response()->json($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Credit Card,Cash,Bank Transfer'
        ]);

        $payment->update($validatedData);

        return response()->json(['message' => 'Payment updated successfully.', 'payment' => $payment]);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
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

    return view('payments.index', compact('payments'));
}



    public function create()
    {
        $reservations = Reservation::all();
        return view('payments.create', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:payments',
            'reservation_id' => 'required',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Credit Card,Cash,Bank Transfer'
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $reservations = Reservation::all();
        return view('payments.edit', compact('payment', 'reservations'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'reservation_id' => 'required',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Credit Card,Cash,Bank Transfer'
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}

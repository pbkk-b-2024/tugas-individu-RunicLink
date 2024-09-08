<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $reservations = Reservation::when($search, function ($query, $search) {
            return $query->where('id', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $guests = Guest::all();
        $rooms = Room::all();
        return view('reservations.create', compact('guests', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:reservations,id|size:6',
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:Booked,Checked-in,Checked-out,Canceled',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $guests = Guest::all();
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'guests', 'rooms'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:Booked,Checked-in,Checked-out,Canceled',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}

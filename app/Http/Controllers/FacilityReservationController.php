<?php

namespace App\Http\Controllers;

use App\Models\FacilityReservation;
use App\Models\Facility;
use App\Models\Reservation;
use Illuminate\Http\Request;

class FacilityReservationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $facilityReservations = FacilityReservation::with(['facility', 'reservation'])
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('facility', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('reservation', function ($q) use ($search) {
                        $q->where('id', 'like', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('facility_reservations.index', compact('facilityReservations'));
    }

    public function create()
    {
        $facilities = Facility::all();
        $reservations = Reservation::all();
        return view('facility_reservations.create', compact('facilities', 'reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:facility_reservations',
            'facility_id' => 'required',
            'reservation_id' => 'required',
            'usage_date' => 'required|date'
        ]);

        FacilityReservation::create($request->all());
        return redirect()->route('facility_reservations.index')->with('success', 'Facility Reservation created successfully.');
    }


    public function show(FacilityReservation $facilityReservation)
    {
        return view('facility_reservations.show', compact('facilityReservation'));
    }

    public function edit(FacilityReservation $facilityReservation)
    {
        $facilities = Facility::all();
        $reservations = Reservation::all();
        return view('facility_reservations.edit', compact('facilityReservation', 'facilities', 'reservations'));
    }

    public function update(Request $request, FacilityReservation $facilityReservation)
    {
        $request->validate([
            'facility_id' => 'required',
            'reservation_id' => 'required',
            'usage_date' => 'required|date'
        ]);

        $facilityReservation->update($request->all());
        return redirect()->route('facility_reservations.index')->with('success', 'Facility Reservation updated successfully.');
    }

    public function destroy(FacilityReservation $facilityReservation)
    {
        $facilityReservation->delete();
        return redirect()->route('facility_reservations.index')->with('success', 'Facility Reservation deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FacilityReservation;
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

        return response()->json($facilityReservations);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:facility_reservations',
            'facility_id' => 'required|exists:facilities,id',
            'reservation_id' => 'required|exists:reservations,id',
            'usage_date' => 'required|date'
        ]);

        $facilityReservation = FacilityReservation::create($validatedData);

        return response()->json(['message' => 'Facility Reservation created successfully.', 'facilityReservation' => $facilityReservation], 201);
    }

    public function show(FacilityReservation $facilityReservation)
    {
        return response()->json($facilityReservation);
    }

    public function update(Request $request, FacilityReservation $facilityReservation)
    {
        $validatedData = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'reservation_id' => 'required|exists:reservations,id',
            'usage_date' => 'required|date'
        ]);

        $facilityReservation->update($validatedData);

        return response()->json(['message' => 'Facility Reservation updated successfully.', 'facilityReservation' => $facilityReservation]);
    }

    public function destroy(FacilityReservation $facilityReservation)
    {
        $facilityReservation->delete();

        return response()->json(['message' => 'Facility Reservation deleted successfully.']);
    }
}

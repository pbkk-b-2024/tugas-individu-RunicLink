<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ServiceReservation;
use Illuminate\Http\Request;

class ServiceReservationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $serviceReservations = ServiceReservation::with(['service', 'reservation'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('service', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('reservation', function ($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return response()->json($serviceReservations);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:service_reservations',
            'service_id' => 'required|exists:services,id',
            'reservation_id' => 'required|exists:reservations,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $serviceReservation = ServiceReservation::create($validatedData);

        return response()->json(['message' => 'Service Reservation created successfully.', 'serviceReservation' => $serviceReservation], 201);
    }

    public function show(ServiceReservation $serviceReservation)
    {
        return response()->json($serviceReservation);
    }

    public function update(Request $request, ServiceReservation $serviceReservation)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'reservation_id' => 'required|exists:reservations,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $serviceReservation->update($validatedData);

        return response()->json(['message' => 'Service Reservation updated successfully.', 'serviceReservation' => $serviceReservation]);
    }

    public function destroy(ServiceReservation $serviceReservation)
    {
        $serviceReservation->delete();

        return response()->json(['message' => 'Service Reservation deleted successfully.']);
    }
}

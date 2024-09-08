<?php

namespace App\Http\Controllers;

use App\Models\ServiceReservation;
use App\Models\Service;
use App\Models\Reservation;
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

        return view('service_reservations.index', compact('serviceReservations'));
    }


    public function create()
    {
        $services = Service::all();
        $reservations = Reservation::all();
        return view('service_reservations.create', compact('services', 'reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:service_reservations',
            'service_id' => 'required',
            'reservation_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        ServiceReservation::create($request->all());
        return redirect()->route('service_reservations.index')->with('success', 'Service Reservation created successfully.');
    }

    public function update(Request $request, ServiceReservation $serviceReservation)
    {
        $request->validate([
            'service_id' => 'required',
            'reservation_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $serviceReservation->update($request->all());
        return redirect()->route('service_reservations.index')->with('success', 'Service Reservation updated successfully.');
    }


    public function show(ServiceReservation $serviceReservation)
    {
        return view('service_reservations.show', compact('serviceReservation'));
    }

    public function edit(ServiceReservation $serviceReservation)
    {
        $services = Service::all();
        $reservations = Reservation::all();
        return view('service_reservations.edit', compact('serviceReservation', 'services', 'reservations'));
    }

    public function destroy(ServiceReservation $serviceReservation)
    {
        $serviceReservation->delete();
        return redirect()->route('service_reservations.index')->with('success', 'Service Reservation deleted successfully.');
    }
}

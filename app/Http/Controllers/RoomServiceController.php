<?php

namespace App\Http\Controllers;

use App\Models\RoomService;
use App\Models\Room;
use App\Models\Employee;
use Illuminate\Http\Request;

class RoomServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $roomServices = RoomService::with(['room', 'employee'])
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('room', function ($q) use ($search) {
                        $q->where('id', 'like', "%{$search}%");
                    })
                    ->orWhereHas('employee', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('room_services.index', compact('roomServices'));
    }

    public function create()
    {
        $rooms = Room::all();
        $employees = Employee::all();
        return view('room_services.create', compact('rooms', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:room_services',
            'room_id' => 'required',
            'employee_id' => 'required',
            'service_date' => 'required|date'
        ]);

        RoomService::create($request->all());
        return redirect()->route('room_services.index')->with('success', 'Room Service created successfully.');
    }

    public function show(RoomService $roomService)
    {
        return view('room_services.show', compact('roomService'));
    }

    public function edit(RoomService $roomService)
    {
        $rooms = Room::all();
        $employees = Employee::all();
        return view('room_services.edit', compact('roomService', 'rooms', 'employees'));
    }

    public function update(Request $request, RoomService $roomService)
    {
        $request->validate([
            'room_id' => 'required',
            'employee_id' => 'required',
            'service_date' => 'required|date'
        ]);

        $roomService->update($request->all());
        return redirect()->route('room_services.index')->with('success', 'Room Service updated successfully.');
    }

    public function destroy(RoomService $roomService)
    {
        $roomService->delete();
        return redirect()->route('room_services.index')->with('success', 'Room Service deleted successfully.');
    }
}

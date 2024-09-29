<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RoomService;
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

        return response()->json($roomServices);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:room_services',
            'room_id' => 'required|exists:rooms,id',
            'employee_id' => 'required|exists:employees,id',
            'service_date' => 'required|date'
        ]);

        $roomService = RoomService::create($validatedData);

        return response()->json(['message' => 'Room Service created successfully.', 'roomService' => $roomService], 201);
    }

    public function show(RoomService $roomService)
    {
        return response()->json($roomService);
    }

    public function update(Request $request, RoomService $roomService)
    {
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'employee_id' => 'required|exists:employees,id',
            'service_date' => 'required|date'
        ]);

        $roomService->update($validatedData);

        return response()->json(['message' => 'Room Service updated successfully.', 'roomService' => $roomService]);
    }

    public function destroy(RoomService $roomService)
    {
        $roomService->delete();

        return response()->json(['message' => 'Room Service deleted successfully.']);
    }
}

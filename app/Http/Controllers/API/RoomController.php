<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $rooms = Room::when($search, function ($query, $search) {
            return $query->where('room_number', 'like', "%{$search}%")
                         ->orWhere('type', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })->paginate(10);

        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:rooms,id|size:6',
            'room_number' => 'required|max:10',
            'type' => 'required|max:50',
            'price_per_night' => 'required|numeric',
            'status' => 'required|in:Available,Occupied',
        ]);

        $room = Room::create($validatedData);

        return response()->json(['message' => 'Room created successfully.', 'room' => $room], 201);
    }

    public function show(Room $room)
    {
        return response()->json($room);
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|max:10',
            'type' => 'required|max:50',
            'price_per_night' => 'required|numeric',
            'status' => 'required|in:Available,Occupied',
        ]);

        $room->update($validatedData);

        return response()->json(['message' => 'Room updated successfully.', 'room' => $room]);
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json(['message' => 'Room deleted successfully.']);
    }
}

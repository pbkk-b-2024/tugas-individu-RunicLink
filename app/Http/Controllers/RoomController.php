<?php

namespace App\Http\Controllers;

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

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:rooms,id|size:6',
            'room_number' => 'required|max:10',
            'type' => 'required|max:50',
            'price_per_night' => 'required|numeric',
            'status' => 'required|in:Available,Occupied',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|max:10',
            'type' => 'required|max:50',
            'price_per_night' => 'required|numeric',
            'status' => 'required|in:Available,Occupied',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}


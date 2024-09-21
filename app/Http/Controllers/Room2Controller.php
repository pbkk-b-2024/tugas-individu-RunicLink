<?php

// app/Http/Controllers/Room2Controller.php
namespace App\Http\Controllers;

use App\Models\Room; // Reuse the existing Room model
use Illuminate\Http\Request;

class Room2Controller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $rooms = Room::when($search, function ($query, $search) {
            return $query->where('room_number', 'like', "%{$search}%")
                         ->orWhere('type', 'like', "%{$search}%")
                         ->orWhere('status', 'like', "%{$search}%");
        })->paginate(10);

        return view('room2.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('room2.show', compact('room'));
    }
}

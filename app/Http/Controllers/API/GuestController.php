<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $guests = Guest::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('phone_number', 'like', "%{$search}%");
        })->paginate(10);

        return response()->json($guests);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:guests,id|size:6',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:guests,email|max:100',
            'phone_number' => 'required|max:15',
            'address' => 'nullable',
        ]);

        $guest = Guest::create($validatedData);

        return response()->json(['message' => 'Guest created successfully.', 'guest' => $guest], 201);
    }

    public function show(Guest $guest)
    {
        return response()->json($guest);
    }

    public function update(Request $request, Guest $guest)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:guests,email,' . $guest->id,
            'phone_number' => 'required|max:15',
            'address' => 'nullable',
        ]);

        $guest->update($validatedData);

        return response()->json(['message' => 'Guest updated successfully.', 'guest' => $guest]);
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return response()->json(['message' => 'Guest deleted successfully.']);
    }
}


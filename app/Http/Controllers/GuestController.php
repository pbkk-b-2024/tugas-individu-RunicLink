<?php

namespace App\Http\Controllers;

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

        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:guests,id|size:6',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:guests,email|max:100',
            'phone_number' => 'required|max:15',
            'address' => 'nullable',
        ]);

        Guest::create($request->all());

        return redirect()->route('guests.index')->with('success', 'Guest created successfully.');
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:guests,email,' . $guest->id,
            'phone_number' => 'required|max:15',
            'address' => 'nullable',
        ]);

        $guest->update($request->all());

        return redirect()->route('guests.index')->with('success', 'Guest updated successfully.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
    }

    public function show(Guest $guest)
    {
        return view('guests.show', compact('guest'));
    }    
}

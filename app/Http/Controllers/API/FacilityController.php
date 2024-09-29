<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $facilities = Facility::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('id', 'like', "%{$search}%");
        })->paginate(10);

        return response()->json($facilities);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:facilities',
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        $facility = Facility::create($validatedData);

        return response()->json(['message' => 'Facility created successfully.', 'facility' => $facility], 201);
    }

    public function show(Facility $facility)
    {
        return response()->json($facility);
    }

    public function update(Request $request, Facility $facility)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        $facility->update($validatedData);

        return response()->json(['message' => 'Facility updated successfully.', 'facility' => $facility]);
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return response()->json(['message' => 'Facility deleted successfully.']);
    }
}

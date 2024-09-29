<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $services = Service::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return response()->json($services);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:services',
            'name' => 'required|max:100',
            'price' => 'required|numeric'
        ]);

        $service = Service::create($validatedData);

        return response()->json(['message' => 'Service created successfully.', 'service' => $service], 201);
    }

    public function show(Service $service)
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric'
        ]);

        $service->update($validatedData);

        return response()->json(['message' => 'Service updated successfully.', 'service' => $service]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully.']);
    }
}

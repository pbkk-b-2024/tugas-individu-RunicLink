<?php

// app/Http/Controllers/Service2Controller.php
namespace App\Http\Controllers;

use App\Models\Service; // Reuse the existing Service model
use Illuminate\Http\Request;

class Service2Controller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $services = Service::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('service2.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('service2.show', compact('service'));
    }
}


<?php

// app/Http/Controllers/Facility2Controller.php
namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class Facility2Controller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $facilities = Facility::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('id', 'like', "%{$search}%");
        })->paginate(10);

        return view('facility2.index', compact('facilities'));
    }

    public function show(Facility $facility)
    {
        return view('facility2.show', compact('facility'));
    }
}

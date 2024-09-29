<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $employees = Employee::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('position', 'like', "%{$search}%")
                         ->orWhere('id', 'like', "%{$search}%");
        })->paginate(10);

        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:employees',
            'name' => 'required|max:100',
            'position' => 'nullable|max:50',
            'salary' => 'nullable|numeric',
            'hire_date' => 'required|date'
        ]);

        $employee = Employee::create($validatedData);

        return response()->json(['message' => 'Employee created successfully.', 'employee' => $employee], 201);
    }

    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'position' => 'nullable|max:50',
            'salary' => 'nullable|numeric',
            'hire_date' => 'required|date'
        ]);

        $employee->update($validatedData);

        return response()->json(['message' => 'Employee updated successfully.', 'employee' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}

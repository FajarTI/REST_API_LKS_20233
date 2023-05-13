<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json(['data' => $employees, 'message' => 'Employees retrieved successfully']);
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json(['data' => $employee, 'message' => 'Employee retrieved successfully']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $employee = Employee::create($validatedData);

        return response()->json(['data' => $employee, 'message' => 'Employee created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $employee->update($validatedData);

        return response()->json(['data' => $employee, 'message' => 'Employee updated successfully'], 200);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
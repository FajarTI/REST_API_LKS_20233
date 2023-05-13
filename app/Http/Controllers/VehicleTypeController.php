<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicleTypes = VehicleType::all();

        return response()->json([
            'data' => $vehicleTypes,
            'message' => 'Successfully retrieved vehicle types.',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        $vehicleType = VehicleType::create($validatedData);

        return response()->json([
            'data' => $vehicleType,
            'message' => 'Vehicle type created successfully.',
        ], 201);
    }

    public function show($id)
    {
        $vehicleType = VehicleType::findOrFail($id);

        return response()->json([
            'data' => $vehicleType,
            'message' => 'Vehicle type retrieved successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->update($validatedData);

        return response()->json([
            'data' => $vehicleType,
            'message' => 'Vehicle type updated successfully.',
        ], 200);
    }

    public function destroy($id)
    {
        $vehicleType = VehicleType::find($id);

        if (!$vehicleType) {
            return response()->json(['message' => 'Vehicle type not found'], 404);
        }

        $vehicleType->delete();

        return response()->json([
            'message' => 'Vehicle type deleted successfully.',
        ]);
    }
}
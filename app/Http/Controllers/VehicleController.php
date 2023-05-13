<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        return response()->json(['message' => 'Success', 'data' => $vehicles], Response::HTTP_OK);
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return response()->json(['message' => 'Success', 'data' => $vehicle], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'member_id' => 'required|exists:members,id',
            'license_plate' => 'required|unique:vehicles,license_plate',
            'notes' => 'nullable',
        ]);

        $vehicle = Vehicle::create($request->all());

        return response()->json(['message' => 'Vehicle created successfully', 'data' => $vehicle], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'member_id' => 'required|exists:members,id',
            'license_plate' => 'required|unique:vehicles,license_plate,' . $id,
            'notes' => 'nullable',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return response()->json(['message' => 'Vehicle updated successfully', 'data' => $vehicle], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully'], Response::HTTP_OK);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\HourlyRate;
use Illuminate\Http\Request;

class HourlyRateController extends Controller
{
    public function index()
    {
        $hourlyRates = HourlyRate::all();

        return response()->json([
            'data' => $hourlyRates,
            'message' => 'Successfully retrieved hourly rates.',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'value' => 'required|numeric',
        ]);

        $hourlyRate = HourlyRate::create($validatedData);

        return response()->json([
            'data' => $hourlyRate,
            'message' => 'Hourly rate created successfully.',
        ], 201);
    }

    public function show($id)
    {
        $hourlyRate = HourlyRate::findOrFail($id);

        return response()->json([
            'data' => $hourlyRate,
            'message' => 'Hourly rate retrieved successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'value' => 'required|numeric',
        ]);

        $hourlyRate = HourlyRate::findOrFail($id);
        $hourlyRate->update($validatedData);

        return response()->json([
            'data' => $hourlyRate,
            'message' => 'Hourly rate updated successfully.',
        ], 200);
    }

    public function destroy($id)
    {
        $hourlyRate = HourlyRate::findOrFail($id);
        $hourlyRate->delete();

        return response()->json([
            'message' => 'Hourly rate deleted successfully.',
        ], 204);
    }
}